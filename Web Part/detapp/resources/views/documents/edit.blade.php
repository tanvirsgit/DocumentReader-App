@extends('layouts.app')

@section('content')
    <h1>Edit Document</h1>
    <div class="container">
        {!! Form::open(['action' => ['DocumentsController@update', $document->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $document->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('initials', 'Initials')}}
                {{Form::text('initials', $document->initials, ['class' => 'form-control', 'placeholder' => 'Initials'])}}
            </div>
            <div class="form-group">
                {{Form::file('document_pdf')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection