<?php

namespace Botble\Blog\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\Fields\TagField;
use Botble\Base\Forms\FormAbstract;
use Botble\Blog\Forms\Fields\CategoryMultiField;
use Botble\Blog\Http\Requests\PostRequest;
use Botble\Blog\Models\Post;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;

class PostForm extends FormAbstract
{

    /**
     * @var string
     */
    protected $template = 'core/base::forms.form-tabs';

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    public function buildForm()
    {
        $selectedCategories = [];
        if ($this->getModel()) {
            $selectedCategories = $this->getModel()->categories()->pluck('category_id')->all();
        }

        if (empty($selectedCategories)) {
            $selectedCategories = app(CategoryInterface::class)
                ->getModel()
                ->where('is_default', 1)
                ->pluck('id')
                ->all();
        }

        $tags = null;

        if ($this->getModel()) {
            $tags = $this->getModel()->tags()->pluck('name')->all();
            $tags = implode(',', $tags);
        }

        if (!$this->formHelper->hasCustomField('categoryMulti')) {
            $this->formHelper->addCustomField('categoryMulti', CategoryMultiField::class);
        }

        $form= $this
            ->setupModel(new Post)
            ->setValidatorClass(PostRequest::class)
            ->withCustomFields()
            ->setCancelAction(true)
            ->addCustomField('tags', TagField::class)
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('is_featured', 'onOff', [
                'label' => trans('core/base::forms.is_featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
//            ->add('is_popular', 'onOff', [
//                'label' => trans('core/base::forms.is_popular'),
//                'label_attr' => ['class' => 'control-label'],
//                'default_value' => false,
//            ])
            ->add('is_slider', 'onOff', [
                'label' => trans('core/base::forms.is_slider'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('content', 'editor', [
                'label' => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('format_type', 'customRadio', [
                'label' => trans('plugins/blog::posts.form.format_type'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => get_post_formats(true),
            ])
            ->add('title_color', 'color', [
                'label' => __('Title Color'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('categories[]', 'categoryMulti', [
                'label' => trans('plugins/blog::posts.form.categories'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => get_categories_with_children(),
                'value' => old('categories', $selectedCategories),
            ])
            ->add('youtube_url', 'text', [
                'label' => trans('Youtube Url'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => trans(''),
                    'data-counter' => 255,
                ],
            ]);
            if($this->getModel()){

                $shortLink=($this->getModel()->short_link)?env('APP_URL').''.$this->getModel()->short_link:null;
               if($shortLink)
                $form= $form->add('Short Links', 'html', [
                    'html' => '<div>Short Link: <br><a style="
                    width: 100px;
                    word-break: break-all;
                " target="_blank" href="'.$shortLink.'">'.$shortLink.'</a><br>

                   </div>
                    ',
                ]);
            }
            $form->add('image', 'mediaImage', [
                'label' => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('tag', 'tags', [
                'label' => trans('plugins/blog::posts.form.tags'),
                'label_attr' => ['class' => 'control-label'],
                'value' => $tags,
                'attr' => [
                    'placeholder' => __('Write some tags'),
                    'data-url' => route('tags.all'),
                ],
            ])

           ->setBreakFieldPoint('status');
    }
}
