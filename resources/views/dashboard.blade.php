@extends('layouts.app',['pageTitle' => __('Dashboard')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Dashboard') }}
@endslot
@endcomponent


<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body">


    </div>
</div> 

@endsection
