@extends('layouts.app')

@section('content')


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student {{ $student->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/student') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/student/' . $student->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa fa-edit" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('student' . '/' . $student->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $student->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $student->name }} </td></tr><tr><th> Email </th><td> {{ $student->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
