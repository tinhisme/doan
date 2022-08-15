<?php

namespace App\Http\Controllers\Backend;

use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class BackendAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();


         
        // foreach($attributes as $attribute){
        //     echo $attribute->type->id;
        // }

        return view('backend.attribute.index', compact('attributes'));


        // lấy những Attribute có category_id là 1

        // $category = Category::findOrFail(1);
        // $attributes = $category->attributes;
        // foreach ($attributes as $attribute) {
        //     echo $attribute->name;
        // }


        // lấy những category có Attribute_id là 1
        // $attribute = Attribute::find(1);

        // $categories = $attribute->categories;
        // foreach ($categories as $category) {
        //     echo $category->name;
        // }

        // foreach ($attribute as $item) {
        //     echo $item->name;
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.attribute.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new Attribute;
        $attribute->fill($request->all());
        $attribute->slug = Str::of($request->name)->slug('-');
        $attribute->save();
        return redirect()->route('get_backend.attribute.create');
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
        //
    }
}
