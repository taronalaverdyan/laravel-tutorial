@extends('layouts.app')

@section('content')
      <form action="/editingpost/{{$post->id}}" method="post">
        {{ csrf_field() }}
        @if (!empty($changed))
          <h2 style="color:green">{{$changed}}</h2>
        @endif
      <div class="form-group">
      <label for="exampleInputEmail1">Change this post</label>
      <input type="text" name="newpost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->description}}">
      <br>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <input  type="submit" class="btn btn-primary" name="" value="Change Post">
      </div>
      <form>
@endsection
