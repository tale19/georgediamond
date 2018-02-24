@extends('layouts.master')

@section('content')

    <div id="news-content">

        <div class="container">
            @yield('pageHeadline')

            @yield('subheading')
        </div>


        <div class="container">

            @yield('post-box')

            @yield('fbComments')

            @if (substr(request()->path(), 0, 4) == 'news' ||
            (request()->path() == 'search' && $searchResults->total() > 5)) {{-- 5 results per page (paginate) --}}
            <hr>
            @endif

            @yield('buttons')

            @yield('pagination')

        </div> <!-- container -->

        @include('partials.confirm-delete')

    </div> <!-- #news-content -->


@endsection

@section('customScripts')
    <script type="text/javascript" src="/js/news.js"></script>
@endsection