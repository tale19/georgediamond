@extends('layouts.admin')

@section('admin-main')
    <h1 class="text-center">Control your shows</h1>
    <hr>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <ul>
            @foreach($shows as $show)
                <li>{{ title_case($show->title) }}</li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Show title</h2>
            </div>
            <div class="col-6">image</div>
            <div class="col-6">text</div>
        </div>
    </div>
@endsection

@section('adminScripts')
    <script>

    </script>
@endsection