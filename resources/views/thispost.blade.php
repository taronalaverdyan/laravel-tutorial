@extends('layouts.app')

@section('content')



 <table class="table table-hover">
   <thead>
     <tr>
       <th><h1> {{$username}}</h1></th>
     </tr>
   </thead>
   <tbody>
     @foreach ($posts as $post)
       @if ($post->user->name == $username)
       <tr>
         <th scope="row">
           <a href="/thispost/{{$post->id}}">
           {{$post->description}}
           </a>
         @endif
       </th>
       </tr>
     @endforeach
   </tbody>
 </table>


@endsection
