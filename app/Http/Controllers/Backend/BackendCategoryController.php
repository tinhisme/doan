<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackendCategoryRequest;

class BackendCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackendCategoryRequest $request)
    {
        //
        $category = new Category;
        $category->fill($request->all());
        $category->slug = Str::of($request->name)->slug('-');
        $category->save();
        return redirect()->route('get_backend.category.index');
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
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BackendCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());
        $category->slug = Str::of($request->name)->slug('-');
        $category->update();
        return redirect()->route('get_backend.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('get_backend.category.index');
    }

    public function status($id)
    {
        $category = Category::find($id);
        $category->status = ! $category->status;
        $category->save();
        return redirect()->route('get_backend.category.index');
    }

    public function hot($id)
    {
        $category = Category::find($id);
        $category->hot = ! $category->hot;
        $category->save();
        return redirect()->route('get_backend.category.index');
    }
}
