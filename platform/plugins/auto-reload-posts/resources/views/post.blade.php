<div class="single-post-box" style="border-bottom: 2px solid #f2f2f2;
    margin-bottom: 30px;
    padding-bottom: 15px;">
    

<div class="title-post">
    <br>
    <h1>{{ $post->name }}</h1>
    <ul class="post-tags">
        <li><i class="fa fa-list-alt"></i><a
                    href="{{ $post->categories->last()->url }}">{{ $post->categories->last()->name }}</a>
        </li>

        </li>
        <li><i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($post->published_at)) }}
        </li>
        <!-- <li><i class="fa fa-eye"></i>{{ $post->views }}</li> -->
    </ul>
</div>



<div class="post-gallery">
    <img width="100%" src="{{ RvMedia::getImageUrl($post->image, 'post_main') }}"
         alt="{{ $post->name }}">
    <span class="image-caption">{{ $post->caption }}</span>
</div>

{!!  $post->content !!}

</div>
