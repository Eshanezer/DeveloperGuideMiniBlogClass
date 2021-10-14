<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management.category.index')->with('categories',(new Category)->getAllCategories());
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
            'name'=>'required|unique:categories,name',
            'cover'=>'required',
            'description'=>'required'
        ]);

        // Upload Image
        $imageName =strtolower($request->name).'.'.$request->cover->extension();
        $request->cover->move(public_path('images/uploads/categories'),$imageName);
        
        (new Category)->add([
            'name'=>$request->name,
            'slug'=>strtolower($request->name),
            'description'=>$request->description,
            'cover'=>$imageName
        ]);

        return redirect()->route('category.index')->with(['status'=>1,'msg'=>'Category Created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        (new Category)->remove($id);
        return redirect()->back()->with(['status'=>1,'msg'=>'Category removed!']);
    }
}
