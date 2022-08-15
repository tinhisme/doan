<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OrderProduct;

class BackendOrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::paginate(10);
        return view('backend.order.index',compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        DB::table('order_products')->where('order_id',$id)
        ->delete();

        return redirect()->back();
    }

    public function getOrderDetail(Request $request, $id)
    {
        $order_product = OrderProduct::where('order_id',$id)->get();
        return view('backend.order_product.index',[
            'order_product' =>  $order_product,
            'id' => $id,
        ]);
    }

    public function destroyOrder(Request $request, $id)
    {
        $order_product = OrderProduct::findOrFail($id);
        $money = $order_product->quantity * $order_product->price;
        DB::table('orders')
            ->where('id',$order_product->order_id)
            ->decrement('total_amount',$money);
        $order_product->delete();
        return back();
    }


}
