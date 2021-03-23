<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //method that displays all posts 
    public function index() {
      //Post returns all posts in eloquent collection 
      //paginate(x),where x is the number of records displayed per page
      $allPosts = Post::paginate(20);
        
        return view('posts.index',[
            'posts' => $allPosts
            
        ]);

    
    }

    public function show($postId) {
        //review postId and userId
        //$post = DB::table('posts')->where('user_id',$postId)->first();
        $post = Post::find($postId);
        //$post->user->name
        //$user = User::find($postId);

        return view('posts.show',[
            'post' => $post,
            //'user' => $user
        ]);
    }

    public function create() {

        return view('posts.create',[
            'users' => User::all()
        ]);
    }
    
    //should insert into database 
    public function store(StorePostRequest $request) {
        $requestData = $request->all();
        Post::create($requestData);
        return redirect()->route('posts.index');
    }

    public function edit($post) {
        
        $post = Post::find($post) ;
        return view('posts.edit',['post'=>$post,'users'=>User::all()]);

    }

    public function update(StorePostRequest $request, Post $post) {
        
        $post->update($request->all());
    
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
        
        // return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }


    // public function destroy($postId)
    // {
    //     $post = Post::find($id);
    //     $post->delete();

    //     return redirect('/posts')->with('success', 'Contact deleted!');
    // }

    // public function destroy($postId) {

    //      $post = Post::delete($postId);
    //      return redirect()->route('posts.index');
    // }

}//end of class PostController extends Controller
