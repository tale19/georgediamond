<section class="post-box row" @if (request()->path() == 'news/'.$post->id) style="margin-top: 50px" @endif>

    <article class="col-sm-6 col-md-7 order-sm-12 article">
        <h2 class="post-headline">{{ $post->title }}</h2>
        <div class="post-body">
            <div class="post-date">{{ $post->created_at->toFormattedDateString() }}</div>
            {!! $post->body !!}
        </div> <!-- .news-preview-content -->
    </article> <!-- news-article -->

    <div class="col-sm-6 col-md-5 post-misc">
        @if(($post->imgname != NULL) && ($post->imgname != ""))
            <div class="post-image-container">
                <img src="/storage/images/news/{{ $post->imgname }}">
            </div>  <!-- .post-image-container -->
        @endif

        @include('partials.share')

        <div class="post-buttons">
            @if ((request()->path() == 'news') || (request()->path() == 'search'))
                <a href="/news/{{ $post->id }}" class="btn btn-primary">Read full news</a>
            @endif
            @auth
                <hr style="border-top: 1px solid #ccc">
                <div class="admin">
                    <a href="/news/{{ $post->id }}/edit" class="btn btn-warning">Edit post</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"
                            data-post-id="{{ $post->id }}" data-post-title="{{ $post->title }}">Delete post
                    </button>
                </div>
            @endauth
        </div>    <!-- .post-buttons -->

    </div>  <!-- .post-misc -->

</section> <!-- .post-box.row -->