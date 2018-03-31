@extends('layouts.app')

@section('content')
    <h1>{{$document->title}}</h1>
    <h5>Uploaded by: {{$document->initials}} | {{$document->user->name}}</h5>
    <hr>
    <small>Created at: {{$document->created_at}}</small>
    <embed src="/storage/document_pdfs/{{$document->document_pdf}}" width="50%" height="50%"/>
    <br><br>
    <a href="/documents" class="btn btn-info">Go Back</a>
    @if(!Auth::guest())
        @if(Auth::user()->id == $document->user_id)
        <a href="/documents/{{$document->id}}/edit" class="btn btn-default">Edit</a>
        {!! Form::open(['action' => ['DocumentsController@destroy', $document->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
        @endif
    @endif
@endsection