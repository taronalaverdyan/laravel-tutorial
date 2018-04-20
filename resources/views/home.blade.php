@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Owner</th>
                <th>Title</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <th scope="row">{{$post->id}}</th>
                  <td> <a href="/thisuserposts/{{$username = $post->user->name}}">{{$post->user->name}}</a></td>
                  <td>{{$post->title}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
