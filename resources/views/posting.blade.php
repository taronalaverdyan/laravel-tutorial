@extends('layouts.app')

@section('content')
  @if (session('postok'))
  <h1 style="text-align: center;color: green">{{'Post Created Sucsessfuly'}}</h1>
  @endif
  <form action="{{route('createpost')}}" method="post" style="border:2px solid" enctype="multipart/form-data">
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
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
     <div class="form-group row">
      <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Choose image for post') }}</label>

       <div class="col-md-6">
         <input id="postimage" type="file" class="form-control" name="postimage" accept="image/png, image/gif, image/jpeg" >
       </div>
     </div>
     <input type="submit" name="" value="create">
</form>
@endsection
