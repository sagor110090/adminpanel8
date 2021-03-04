@extends('layouts.app')

@section('content')


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Student</div>
                    <div class="card-body">
                        <a href="{{ url('/student') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/student') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('student.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>

@endsection
