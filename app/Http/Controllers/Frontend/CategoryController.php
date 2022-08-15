<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Facade\FlareClient\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Frontend\FrontendController;

class CategoryController extends FrontendController
{
    
    public function getCategory(Request $request, $slug)
    {
        $arraySlugs = explode('-',$slug);
        $id = array_pop($arraySlugs);
        // dd($id);
        if($id){
            $products = Product::where('category_id',$id)->get();
            return view('frontend.pages.product.index',compact('products'));
        }
        return redirect('/');
    }
}
