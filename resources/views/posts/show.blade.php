@extends('layouts.post')

@section('title', $post->title)

@section('post-box')
    @include('posts.box')
@endsection

@section('buttons')
    <div class="nav-buttons row justify-content-start">
        <div class="col-4">
            <a href="/news" class="btn btn-primary"><i class="fas fa-angle-left"></i> Back to all news</a>
        </div>
        <div class="col-sm-4">
            <a href="/" class="btn btn-outline-success"><strong>Explore</strong></a>
        </div>
    </div>
@endsection

@section('fbComments')
    <div class="fb-comments" data-href="george-diamond.lrv.tale/news/{{ $post->id }}" data-numposts="5"></div>
@endsection