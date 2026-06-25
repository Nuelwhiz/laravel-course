@extends('layout')

@section('content')
    
<h1>{{$heading}}</h1>
@foreach ($listing as $listings)
<h2 ><a href="/listing/{{$listings['id']}}">{{$listings['title']}}</a></h2>
<p>{{$listings['discription']}}</p>
@endforeach

@endsection


