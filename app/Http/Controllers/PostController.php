<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management.post.index')->with('categories', Category::pluck('name', 'id'))->with('userPosts', (new Post)->getAllPostsByUser(auth()->user()->id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'cover' => 'required',
        ]);

        // Upload Image
        $imageName = strtolower($request->name) . '.' . $request->cover->extension();
        $request->cover->move(public_path('images/uploads/post'), $imageName);

        Category::add([]);

        (new Post)->add([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => strtolower($request->name),
            'cover' => $imageName,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with(['status' => 1, 'msg' => 'Post Created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = (new Post)->getPostById($id);
        return view('post.view')
            ->with('post',$post)
            ->with('comments',(new Comment)->getCommentsByPostIdAndComment($id,true))
            ->with('popularPosts',(new Post)->getAllPostsByUserAndCount($post->user_id,3))
            ->with('categories',(new Category)->getCategoriesPostCount());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Post)->remove($id);
        return redirect()->back()->with(['status' => 1, 'msg' => 'Post removed!']);
    }
}
