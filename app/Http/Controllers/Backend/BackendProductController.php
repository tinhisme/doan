<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackendProductRequest;

class BackendProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(10);

        return view('backend.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $suppliers = Supplier::all();

        
        return view('backend.product.create',compact('categories','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackendProductRequest $request)
    {
        //
        $products = new Product();
        $products->fill($request->all());
        $products->slug = Str::of($request->name)->slug('-');

        if ($request->avatar) {
            $image = upload_image('avatar');
            if ($image['code'] == 1) 
                $products['avatar'] = $image['name'];
        }
         
        $products->save();
        return redirect()->route('get_backend.product.index');

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
        $categories = Category::all();
        $suppliers = Supplier::all();
        $product = Product::find($id);
        return view('backend.product.edit',compact('product','categories','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BackendProductRequest $request, $id)
    {
        //
        $product = Product::find($id);
        $product->fill($request->all());
        $product->slug = Str::of($request->name)->slug('-');
        if ($request->avatar) {
            $image = upload_image('avatar');
            if ($image['code'] == 1) 
                $product['avatar'] = $image['name'];
        } 
        $product->update();
        return redirect()->route('get_backend.product.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('get_backend.product.index');
    }

    public function status($id)
    {
        $product = Product::find($id);
        $product->status = ! $product->status;
        $product->save();
        return redirect()->route('get_backend.product.index');
    }

    public function hot($id)
    {
        $product = Product::find($id);
        $product->hot = ! $product->hot;
        $product->save();
        return redirect()->route('get_backend.product.index');
    }
}
