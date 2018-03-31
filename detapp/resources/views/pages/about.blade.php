@extends('layouts.app')

@section('content')
    <h1>About</h1>
    <p>Developed Using: </p>
    @if(count($technologies) > 0)
        <ul>
            @foreach($technologies as $technology)
            <li>{{$technology}}</li>
            @endforeach
        </ul>
    @endif
    <h2>Contributors: </h2>
        <h4>Sarwat Islam Dipanzan</h4>
        <h4>Niyaz Bin Hashem</h4>
        <h4>Rifat Arefin Badhon</h4>
        <h4>Taskin Fatema</h4>
        <h4>Md. Nasir Uddin</h4>
        <h4>Sakif Md. Fahim</h4>
        <h4>Abdullah Al Noman Abir</h4>
        <h4>Farhan Tanvir</h4>
@endsection
