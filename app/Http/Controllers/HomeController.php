<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('welcome')
        ->with('categories',(new Category)->getByCount('created_at','desc',6))
        ->with('recentltPosted',(new Post)->getPostByCount('created_at','desc',9));
    }

    public function getPostByCategory($id){
        return view('post_by_category')
        ->with('category',(new Category)->getCategoryById($id))
        ->with('posts',(new Post)->getPostsByCategory($id));

        // return view('post_by_category')
        // ->with('category',Category::findOrFail($id))
        // ->with('post',Post::where('category_id',$id)->orderBy('created_at','desc')->get());
    }
}
