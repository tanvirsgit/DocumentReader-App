@extends('layouts.app')

@section('content')
    <center><h1>Upload Documents</h1></center>
    <div class="container">
        {!! Form::open(['action' => 'DocumentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('initials', 'Initials')}}
                {{Form::text('initials', '', ['class' => 'form-control', 'placeholder' => 'Initials'])}}
            </div>
            <div class="form-group">
                {{Form::file('document_pdf')}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection