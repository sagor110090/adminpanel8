@extends('layouts.app',['pageTitle' => __(' Student')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Student') }}
    @endslot
@endcomponent


<div class="card">
    <h6 class="card-header">{{ __(' Student List') }}</h6>

    <div class="card-body">

            <a href="{{ url('/admin/student/create') }}" class="btn btn-success btn-sm"
                title="Add New  Student">
                <i class="feather-16" data-feather="plus"></i> {{ __('Add New') }}
            </a>

            @livewire('table', [
                'fields' => ['name','role','father_name','mother_name',],
                'actionLink' => ['show','edit','delete'],
                'path' => "/admin/student",
                'searchable' => ['name','role','father_name','mother_name',],
                'modelName' => str_replace(" ","",'App\Models\ Student')
           ])

    </div>
</div>


@endsection
