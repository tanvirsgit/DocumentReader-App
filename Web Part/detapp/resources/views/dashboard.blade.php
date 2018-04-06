@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
                        <a href="/documents/create" class= "btn btn-primary">Upload Documents</a>
                        <hr>
                        <h3>Documents Uploaded: </h3>
                        @if(count($documents) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($documents as $document)
                                    <tr>
                                        <td><a href="/documents/{{$document->id}}">{{$document->title}}</a></td>
                                        <td>{{$document->initials}}</td>
                                        <td><a href="/documents/{{$document->id}}/edit">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['DocumentsController@destroy', $document->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no documents</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
