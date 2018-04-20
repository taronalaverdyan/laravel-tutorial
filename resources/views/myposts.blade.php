@extends('layouts.app')

@section('content')
  <a href="{{route('forposting')}}"> <button type="button" name="button">create new post</button>  </a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <th scope="row"><h2><a href="/editmypost/{{$post->id}}">{{$post->description}}</a></h2></th>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
