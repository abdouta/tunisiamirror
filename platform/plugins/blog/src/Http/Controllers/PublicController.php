<?php

namespace Botble\Blog\Http\Controllers;

use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\Blog\Services\BlogService;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Response;
use SeoHelper;
use SlugHelper;
use Theme;

class PublicController extends Controller
{

    /**
     * @var TagInterface
     */
    protected $tagRepository;

    /**
     * @var SlugInterface
     */
    protected $slugRepository;

    /**
     * PublicController constructor.
     * @param TagInterface $tagRepository
     * @param SlugInterface $slugRepository
     */
    public function __construct(TagInterface $tagRepository, SlugInterface $slugRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->slugRepository = $slugRepository;
    }

    /**
     * @param Request $request
     * @param PostInterface $postRepository
     * @return Response
     */
    public function getSearch(Request $request, PostInterface $postRepository)
    {
        $query = $request->input('q');
        SeoHelper::setTitle(__('Search result for: ') . '"' . $query . '"')
            ->setDescription(__('Search result for: ') . '"' . $query . '"');

        $posts = $postRepository->getSearch($query, 0, 12);

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add(__('Search result for: ') . '"' . $query . '"', route('public.search'));

        return Theme::scope('search', compact('posts'))
            ->render();
    }

    /**
     * @param string $slug
     * @param Request $request
     * @return Response
     */
    public function getTag($slug, BlogService $blogService)
    {
        $slug = $this->slugRepository->getFirstBy([
            'key'            => $slug,
            'prefix'         => SlugHelper::getPrefix(Tag::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }

    /**
     * @param string $slug
     * @param BlogService $blogService
     * @return Response
     */
    public function getPost($slug, BlogService $blogService)
    {

        $slug = $this->slugRepository->getFirstBy([
            'key'    => $slug,
            'prefix' => SlugHelper::getPrefix(Post::class),
        ]);

        if (!$slug) {
            $post=Post::where(['short_link'=>$slug])->first();

            if (!$post) {
            abort(404);
            }else{
                $slug = $this->slugRepository->getFirstBy([
                    'reference_id'    => $post->id,
                    'reference_type'=>'Botble\Blog\Models\Post',
                    'prefix' => SlugHelper::getPrefix(Post::class),
                ]);
                dd($slug);
                if (!$slug) {
                    abort(404);
                    }
            }
        }

        $data = $blogService->handleFrontRoutes($slug);

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }

    /**
     * @param string $slug
     * @param BlogService $blogService
     * @return Response
     */
    public function getCategory($slug, BlogService $blogService)
    {
        $slug = $this->slugRepository->getFirstBy([
            'key'    => $slug,
            'prefix' => SlugHelper::getPrefix(Category::class),
        ]);

        if (!$slug) {
            abort(404);
        }

        $data = $blogService->handleFrontRoutes($slug);

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }
}
