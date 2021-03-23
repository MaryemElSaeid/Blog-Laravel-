@extends('layouts.app')
@section('title')Index Page @endsection
@section('content')


<button type="button" class="btn btn-success" style="margin-bottom:20px">
<a href="{{ route('posts.create') }}">
Create Post
</a></button>
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Slug</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  
  @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      @if(session()->get('danger'))
      <div class="alert alert-danger">
          {{ session()->get('danger') }}
      </div>
      @endif
      
  @foreach($posts as $post)

    <tr>
    
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <!-- ana 3ayza mel post obj ageeb el user obj -->
      <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
      <td>{{  $post->slug ? $post->slug : 'missing-slug' }}</td>
      <td>​​​​​{{ $post->created_at->format('Y-m-d') }}</td>

      <td>
      <form action="{{ route('posts.destroy',['post'=> $post['id']]) }}" method="POST"> 
          <button type="button" class="btn btn-info"  ><a style="color:white;" href="{{ route('posts.show',['post'=> $post['id']]) }}">View</a></button>
          <button type="button" class="btn btn-primary"><a style="color:white;" href="{{ route('posts.edit',['post'=> $post['id']]) }}">Edit</button>
          @csrf
          @method('DELETE')      
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post ?')" >
          Delete</button>
      </form>
      </div>

      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{$posts->links("pagination::bootstrap-4")}}
</div>

@endsection

    
