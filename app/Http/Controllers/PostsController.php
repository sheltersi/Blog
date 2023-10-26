<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Rule;

class PostsController extends Controller
{
    public function index(){
 
// the code above is becoming messy assuming we have a lot of search boxes
// because we can't create a method here that will hold the above code,
//we will nee to create a controller


return view('posts.index',[
 'posts' => Post::latest()->filter(
    request(['search', 'category','author']))->paginate(10)->withQueryString(),


]);
   
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post'=>$post
        ]);
    
}

public function create(){

    return view('posts.create');
}

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

//returns a view page to edit the post


}
