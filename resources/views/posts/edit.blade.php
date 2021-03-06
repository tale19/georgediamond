@extends('layouts.post')

@section('title', 'Edit post')

@section('head-bottom')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            content_css: '/css/tinymce.css, http://fonts.googleapis.com/css?family=Barlow+Semi+Condensed',
            branding: false,
            plugins: 'link',
            menubar: false,
            toolbar: 'undo redo | cut copy paste | bold italic underline | alignleft aligncenter alignright alignjustify | formatselect | link',
            block_formats: 'Paragraph=p; Header 3=h3; Header 4=h4'
        });
    </script>
@endsection

@section('pageHeadline')
    <h1 class="page-headline">Create new post</h1>
@endsection

@section('post-box')

    <form method="POST" action="/news/{{ $post->id }}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <section class="post-box row">

            <article class="col-sm-6 col-md-7 order-sm-12 article">

                <div class="form-group">
                    <label for="post-title">Title</label>
                    <input name="title" id="post-title" type="text" value="{{ $post->title }}" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="post-body">Body</label>
                    <textarea name="body" id="post-body" rows="10" class="form-control">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update post</button>
                    <a href="/news/{{ $post->id }}" class="btn btn-danger">Cancel</a>
                </div>
                @include('partials.errors')
            </article> <!-- news-article -->

            <div class="col-sm-6 col-md-5 post-misc">
                <div class="post-image-container">
                    <img src="/storage/images/news/{{ $post->imgname }}" alt="">
                    <div class="form-group">
                        <label for="post-image">Upload new image</label>
                        <input type="file" name="image" id="post-image" class="form-control-file"/>
                        <p>Supported formats are JPEG, PNG and GIF. Max filesize is 2MB.</p>
                    </div>
                </div>  <!-- .post-image-container -->
            </div>  <!-- .post-misc -->

        </section> <!-- .post-box.row -->

    </form>

@endsection