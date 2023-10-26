<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $with =['category','author'];

    public function scopeFilter($query, array $filters)
    { 
    // the following queries are the same as sql statements
// Does the same thing as the code commented above
//this conditional checks for search
    $query->when($filters['search'] ?? false, fn($query, $search)=>
     $query->where(fn($query)=>
       $query->where('title','like','%' . $search . '%')
        ->orWhere('body','like','%' . $search . '%')
     )
    );  
    
    // code for searching posts by categories

    $query->when($filters['category'] ?? false, fn($query, $category)=>
    $query->whereHas('category', fn ($query)=> 
    $query->where('slug', $category)));

    $query->when($filters['author'] ?? false, fn($query, $author)=>
    $query->whereHas('author', fn ($query)=> 
    $query->where('username', $author)));

}

public function comments(){
    return $this->hasMany(Comment::class);
}

    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // the user_id is meant to override author_id since
    // laravel will just assume that its an author_id column
}
