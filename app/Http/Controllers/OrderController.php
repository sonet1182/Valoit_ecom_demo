<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Orderitem;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    function user_order(Request $req)
    {
        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->price = $req->input('price');
        $order->address = $req->input('address');
        $order->city = $req->input('city');
        $order->phone = $req->input('phone');
        $order->place = $req->input('place');

        $order->save();

        return redirect('order_success');

    }

    function order_success()
    {
        $order = Order::where('user_id','=',Auth::user()->id)->get();

        $cart = Cart::where('user_id','=',Auth::user()->id)->get();


        foreach ($cart as $data)
        {
            Orderitem::create([
                'user_id' => $data['user_id'],
                'item_id' => $data['item_id'],
                'quantity' => $data['quantity']
            ]);

            Cart::destroy($data);
        }

        //$id = Cart::where('user_id','=',Auth::user()->id)->get();
        //Cart::destroy($id);

        return view('frontend.order_success')->with('order',$order);
    }
}
