@extends('layouts.post')

@section('title', 'Search results')

@section('pageHeadline')
    <h1 class="page-headline">Search</h1>
@endsection

@section('subheading')
    <div class="subheading row justify-content-between">
        <div class="col-sm-6 col-md-8">
            <p class="search-results">
                <strong>
                    @if ($searchResults->total() > 1)
                        {{ $searchResults->total() }} results found
                    @elseif ($searchResults->total() == 1)
                        1 result found
                    @else
                        No results found
                    @endif
                </strong>
                for <em>"{{ strlen($query) > 120 ? substr($query,0,120)."..." : $query }}"</em>
            </p>
        </div>
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
    @if(($searchResults->count() > 0))
        @foreach ($searchResults as $post)
            @include('posts.box')
        @endforeach
    @endif
@endsection

@section('pagination', $searchResults->links('partials.pagination'))

@section('scrollTop')
    @include('partials.scrolltop')
@endsection