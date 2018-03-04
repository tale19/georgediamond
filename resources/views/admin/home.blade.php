@extends('layouts.admin')

@section('admin-main')
    <h1 class="text-center">Welcome back, {{ Auth::user()->name }}!</h1>
    <hr>
    {{--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">--}}

    {{--</div>--}}
@endsection