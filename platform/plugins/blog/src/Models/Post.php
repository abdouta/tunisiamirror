<?php

namespace Botble\Blog\Models;

use Botble\ACL\Models\User;
use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Revision\RevisionableTrait;
use Botble\Slug\Traits\SlugTrait;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends BaseModel
{
    use RevisionableTrait;
    use SlugTrait;
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var mixed
     */
    protected $revisionEnabled = true;

    /**
     * @var mixed
     */
    protected $revisionCleanup = true;

    /**
     * @var int
     */
    protected $historyLimit = 20;

    /**
     * @var array
     */
    protected $dontKeepRevisionOf = [
        'content',
        'views',
    ];

    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'image',
        'is_featured',
        'is_popular',
        'is_slider',
        'format_type',
        'status',
        'author_id',
        'author_type',
        'title_color',
        'youtube_url',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * @deprecated
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    /**
     * @return MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) {
            $post->categories()->detach();
            $post->tags()->detach();
        });
    }

    public static function getPopularPosts($limit = 10, array $with = [])
    {
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,
//            'posts.is_popular' => 1,
        ])
            ->whereMonth('posts.created_at', '=',date('m'))
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
//            ->orderBy('posts.created_at', 'desc')
            ->orderBy('posts.views', 'desc')->get();
    }
    public static function getLatestPosts($limit = 10, array $with = [])
    {
        return Post::where([
            'posts.status' => BaseStatusEnum::PUBLISHED,

        ])
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')->get();
    }

    public static function getPostsByCategory($cat_id, $limit = 10,$is_featured=0 ,array $with = [])
    {
        $where=[];
        $where[ 'posts.status' ]=BaseStatusEnum::PUBLISHED;
        if($is_featured) $where[ 'posts.is_featured']=$is_featured;
        return Post::whereHas('categories', function (Builder $query)use ($cat_id) {
            $query->where('category_id', $cat_id);
        })->

        where($where)
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')->get();
    }

    /**
     * {@inheritDoc}
     */
    public static function getGadgets()
    {
        $categoryId = [51,20, 29, 50, 28, 27, 48, 47, 26, 44, 43, 35, 34, 33, 30 ];
        if (!is_array($categoryId)) {
            $categoryId = [$categoryId];
        }

        return Post::where('posts.status', BaseStatusEnum::PUBLISHED)
                ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
                ->join('categories', 'post_categories.category_id', '=', 'categories.id')
                ->whereIn('post_categories.category_id', $categoryId)
                ->select('posts.*')
                ->distinct()
                ->with('slugable')
                ->orderBy('posts.created_at', 'desc')->get();
    }
    
    public static function getSlider($limit = 8, array $with = [])
    {
        return $data = Post::select('*')
            ->where('is_slider', 1)

            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc')
            ->limit($limit)->get();
    }
    
}
