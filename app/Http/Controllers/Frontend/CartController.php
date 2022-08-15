<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Carbon\Carbon;


class CartController extends Controller
{
    //
    public function index()
    {
        $shoppings = Cart::content();
        return view('frontend.pages.cart.index',compact('shoppings'));
    }
    public function add($id)
    {
        $product = Product::find($id);
        Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => 1, 
            'weight' =>0,
            'price' => number_price($product->price, $product->sale), 
            'options' => [
                'sale' => $product->sale,
                'avatar' => $product->avatar,
            ]
        ]);
        return redirect('/');

    }

    public function postPay(Request $request)
    {
        // dd($request->all());
        // lưu vào bảng orders
        // $orders = new Order();
        // $orders->fill($request->all());
        // if(Auth::user()->id){
        //     $orders->user_id = Auth::user()->id;
        // }
        // $orders->total_amount = $request->Str::replace(',', '', Cart::subtotal(0));
        // dd($orders);
        // $orders->save();

        $data = $request->except("_token");
         if(Auth::user()->id){
            $data['user_id'] = Auth::user()->id;
        }
        $data['total_amount'] = Str::replace(',', '', Cart::subtotal(0));
        $data['created_at'] = Carbon::now();
        $orderID = Order::insertGetId($data);
        // nếu lưu vào bảng order_product
        if($orderID){
            $shoppings = Cart::content();
            foreach($shoppings as $key => $item){
                // lưu chi tiết đơn hàng
                $od_pro = OrderProduct::create([
                    'order_id' => $orderID,
                    'product_id' => $item->id,
                    'sale' => $item->options->sale,
                    'quantity' => $item->qty,
                    'price' =>  $item->price,
                ]);
            }
        }
        Cart::destroy();
        return redirect()->to('/');
    }

    public function delete($rowId){
        Cart::remove($rowId);
        return redirect()->route('shopping.list');
    }

    


}
