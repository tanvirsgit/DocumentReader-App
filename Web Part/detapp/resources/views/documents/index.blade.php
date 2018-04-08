@extends('layouts.app')

@section('content')
    <h1>Documents</h1>
    <center><a href="#" id="gazeBegin"><img src="{{ asset('img/eye.png')}}" alt=""></a></center>
    @if(count($documents) > 0)
        @foreach($documents as $document)
            <div class="text-center">
                <a href="/documents/{{$document->id}}"><h4>{{$document->title}}</h4></a>
                <small>Uploaded by: {{$document->initials}} | {{$document->user->name}}</small>
                <embed src="/storage/document_pdfs/{{$document->document_pdf}}" width="1440px" height="1080px"/>
            </div>
        @endforeach
        {{ $documents->links() }}
    @else
        <p>No documents found</p>
    @endif
    <center><a href="#" onclick="webgazer.end();"><img src="{{ asset('img/eye_cross.png') }}" alt=""></a></center>
@endsection