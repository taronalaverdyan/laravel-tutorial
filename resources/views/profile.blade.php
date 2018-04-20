@extends('layouts.app')

@section('content')
  <form action="{{route('changeprofile')}}" style="width:50%; margin:0 auto" method="post">
    {{ csrf_field() }}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (!empty($changed))
  <h2 style="text-align:center; color:green">{{$changed}}</h2>
@endif

  <div class="form-group">
    <label for="exampleInputEmail1">Change Email address</label>
    <input type="email" name="newemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Change name </label>
    <input type="text" name="newname" class="form-control" id="exampleInputPassword1" value="{{Auth::user()->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Change</button>
</form>


  @if (empty($image))
    <form action="{{route('uploadimage')}}" style="width:50%; margin:0 auto; border:1px solid" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
       <div class="form-group row">
        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar (optional)') }}</label>

         <div class="col-md-6">
           <input id="avatar" type="file" class="form-control" name="avatar" accept="image/png, image/gif, image/jpeg" >
         </div>
       </div>
       <input type="submit" name="" value="upload" class="btn btn-primary">
     </form>
   @else
     <h1 style="text-align:center; color: green">{{'You have avatar image'}}</h1>
     <img style="border-radius: 50%;margin: 0 auto;display: block;" src="uploads/{{$image->image_src}}" alt="">
  @endif

@endsection
