@extends('layouts.app')
@section('title')Create Page @endsection
@section('content')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('posts.store')}}">
@csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
      <label for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
   
    @foreach ($users as $user)
      <option value="{{$user->id}}">{{ $user->name}}</option>
    @endforeach
    
    </select>
  </div>
  <!-- posts.store -->
  <button type="submit" class="btn btn-success" style="margin-bottom:20px">Create</button>
</form>
</div>

@endsection

