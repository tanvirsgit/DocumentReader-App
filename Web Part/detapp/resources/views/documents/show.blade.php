@extends('layouts.app')

@section('content')
    <h1>{{$document->title}}</h1>
    <h5>Uploaded by: {{$document->initials}} | {{$document->user->name}}</h5>
    <a href="/documents" class="btn btn-info" style="">Go Back</a>
    <hr>
    <small>Created at: {{$document->created_at}}</small>
    <embed src="/storage/document_pdfs/{{$document->document_pdf}}" width="1440px" height="1080px"/>
    <br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $document->user_id)
        <a href="/documents/{{$document->id}}/edit" class="btn btn-info">Edit&nbsp;&nbsp;&nbsp;</a>
        <br><br>
        {!! Form::open(['action' => ['DocumentsController@destroy', $document->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
        @endif
    @endif
@endsection