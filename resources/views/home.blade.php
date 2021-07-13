@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<h1 class="m-0 text-dark">{{ trans('sentence.dashboard')}} </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">{{ trans('sentence.welcome')}} </p>
                </div>
            </div>
        </div>
    </div>
@stop
