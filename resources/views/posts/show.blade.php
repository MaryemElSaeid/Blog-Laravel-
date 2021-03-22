@extends('layouts.app')
@section('title')Show Page @endsection
@section('content')

<div class="card" style="margin-bottom:20px">
  <div class="card-header">
    Post Info
  </div>
    
 
  <div class="card-body">
    <h5 class="card-title"><h5 style="display:inline">Title:</h5>  {{ $post->title }}</h5>
    <p class="card-text"><h5 style="display:inline">Description:</h5> {{ $post->description }}</p>
  </div>

</div>
<div class="card">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
  
    <h5 class="card-title"><h5 style="display:inline">Name:</h5> {{ $post->user ? $post->user->name : 'user not found'}}</h5>
    <p class="card-text"><h5 style="display:inline">Email:</h5> {{ $post->user ? $post->user->email : 'user not found' }}</p>
    <p class="card-text"><h5 style="display:inline">Created At:</h5> {{ $post->user ? $post->user->created_at ->format('l jS \of F Y h:i:s A') : 'user not found' }}</p>
 
  </div>
</div>
</div>

@endsection
