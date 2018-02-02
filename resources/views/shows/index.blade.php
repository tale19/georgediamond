@extends('layouts.master')

@section('title', 'Shows')

@section('content')

    <div id="shows-content">

        <h1 class="page-headline">Shows</h1>

        <div class="container">
            <div class="jumbotron">
                <p>
                    George Diamond's shows and specialty acts have been designed and structured to deliver an
                    unforgettable magical entertainment by the highest standards of the entertainment industry. His
                    performances are family oriented, and they appeal to audiences of different nationalities, age, and
                    interest groups worldwide. George's pricing structure will also ensure you get the highest value for
                    money possible with this level and quality of entertainment!
                </p>
                <hr>
                <p>The shows George performs come in the following formats:​​</p>
                <ul id="shows-full-list">
                    @foreach($shows as $show)
                        <li>
                            <a href="#"
                               id="shows-{{ $show->type }}-shortcut"
                               data-target="shows-{{ $show->type }}"
                               class="shows-full-list-item">{{ $show->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div> <!-- .jumbotron -->
        </div> <!-- .container -->

        @foreach ($shows as $show)
            <div class="container-fluid show-box">
                <div class="container">
                    <div id="shows-{{ $show->type }}" class="row">
                        <div class="col-sm-6 show-article <?= ($show->id % 2) ? 'odd' : 'even col-sm-1 order-12' ?>">
                            <h4>{{ $show->title }}</h4>
                            <div class="paragraph">
                                {!! nl2br(e($show->body)) !!}
                            </div>
                        </div>
                        <div class="col-sm-6 shows-misc <?= ($show->id % 2) ? 'odd' : 'even col-sm-1 order-1' ?>">
                            <img src="/storage/images/shows/{{ $show->img_name }}">
                            @if ( ! empty($show->videos->all()))
                                <button
                                        data-target="#videoModal"
                                        data-toggle="modal"
                                        data-show-id="{{ $show->id }}"
                                        data-video="{{ $show->videos[0]->ytid    }}"
                                        class="video-button main-video-button btn-lg btn-default">
                                    Watch video
                                </button>
                            @endif
                        </div>
                    </div> <!-- .row -->
                </div> <!-- .container -->
            </div> <!-- .container-fluid -->
        @endforeach


    </div> <!-- content -->

    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="iframeYT" class="embed-responsive-item"
                                src="https://www.youtube.com/embed/"
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <ul></ul>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scrollTop')
    @include('partials.scrolltop')
@endsection

@section('customScripts')
    <script type="text/javascript" src="js/shows.js"></script>
@endsection
