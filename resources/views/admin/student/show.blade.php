@extends('layouts.app',['pageTitle' => __(' Student Show')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Student') }}
    @endslot
@endcomponent
<div class="card">
    <div class="card-header">{{ __(' Student') }}</div>
    <div class="card-body">

        <a href="#" onclick="history.back()" title="Back"><button
            class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> {{ __('Back') }}
            </button></a>
        
        <a href="{{ url('/admin/student/' . $student->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> {{ __('Edit') }}</button></a>
        
        <form method="POST" id="deleteButton{{$student->id}}" action="{{ url('admin/student' . '/' . $student->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$student->id}})"><i class="feather-16" data-feather="trash-2"></i> {{ __('Delete') }}</button>
        </form> 
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr><th> Name </th><td> {{ $student->name }} </td></tr><tr><th> Role </th><td> {{ $student->role }} </td></tr><tr><th> Father Name </th><td> {{ $student->father_name }} </td></tr><tr><th> Mother Name </th><td> {{ $student->mother_name }} </td></tr>
                </tbody>
            </table>
        </div>

    </div>
</div>


@endsection
