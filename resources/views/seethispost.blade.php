@extends('layouts.app')

@section('content')
  {{'title '}} <h2>{{$post->title}}</h2>
  {{'description '}}<h2>{{$post->description}}</h2>
  {{'postimage'}} <img src="/postuploadimages/{{$post->image}}" alt="">

@endsection
