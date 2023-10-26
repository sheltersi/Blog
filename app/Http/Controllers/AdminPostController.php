<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    //the below function shows all the posts
public function index()
{
    return view('admin.posts.index', [
        // 'posts' => Post::paginate(50)
        'posts' => Post::all()
    ]);
}


//shows the page to create the post
public function create(){

    return view('posts.create');
}


//Store a new post
public function store(Post $post)
{


   $attributes = request()->validate([
        'title' => 'required',
        'slug' => ['required','unique:posts'],//to give us an error when the user puts information that already exits in slug txtbox
        'thumbnail' => 'required|image',
        'body' => 'required',
        'excerpt' => 'required',
        'category_id' =>[ 'required','exists:categories,id'] //meaning that its required
        //and it must be in categories table and id column;
    ]);


    //to link the created post and the user_id we say
    $attributes['user_id'] =auth()->id();
$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

    Post::create($attributes);

    //or you can use the array merge 

   return redirect('/');
   
//    ->with('success', 'Posts successfully published');

}

public function edit(Post $post)
{
    return view('admin.posts.edit', ['post' => $post]);
}

public function update(Post $post){
$attributes = request()->validate([
    'title' => 'required',
    'slug' => ['required'],//to give us an error when the user puts information that already exits in slug txtbox
    'thumbnail' => 'image',
    'body' => 'required',
    'excerpt' => 'required',
    'category_id' =>[ 'required','exists:categories,id'] //meaning that its required
    //and it must be in categories table and id column;
]);

if(isset($attributes['thumbnail'])){
$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
}

$post->update($attributes);

return back()->with('success', 'post Updated!');
}

public function destroy(Post $post)
{
    $post->delete();

    return back()->with('success', 'Post Deleted!');
}
}