@extends('layouts.post')

@section('title', 'News')

@section('pageHeadline')
    <h1 class="page-headline">News</h1>
@endsection

@section('subheading')
    <div class="subheading row justify-content-between">
        @auth
        <div class="col-sm-6 col-md-8">
            <a href="/news/create" class="btn btn-success">Create new post</a>
        </div>
        @endauth
        <div class="searchbox col-sm-4">
            <form class="input-group" method="GET" action="/search">
                <input name="q" type="text" class="form-control" placeholder="Search the news">
                <span class="input-group-btn">
						<button class="btn btn-default" type="submit">Go!</button>
					</span>
            </form> <!-- /input-group -->
        </div>
    </div>
@endsection

@section('post-box')
    @foreach ($posts as $post)
        @include('posts.box')
    @endforeach
@endsection

@section('pagination', $posts->links('partials.pagination'))

@section('scrollTop')
    @include('partials.scrolltop')
@endsection