@extends('layouts.app')
@section('title')Edit Page @endsection
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

<form method="POST" action="{{ route('posts.update',['post'=> $post['id']]) }}">
@csrf
@method('PUT')

<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{ $post->title }}">
  </div>
  <div class="form-group">
 
    <label for="exampleFormControlTextarea1">Description:</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
  </div>
  <div class="form-group">
      <label for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
   
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{ $user->name}}</option>
      @endforeach
    
    </select>
  </div>
  <button type="submit" class="btn btn-primary" style="margin-bottom:20px">Update</button>
</form>
</div>

@endsection

