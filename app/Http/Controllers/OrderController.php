<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Orderitem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    function user_order(Request $req)
    {
        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->address = $req->input('address');
        $order->city = $req->input('city');
        $order->phone = $req->input('phone');
        $order->place = $req->input('place');

        if($order->place = 'Inside')
        {
            $order->price = $req->input('price')+50;
        }
        if($order->place = 'Outside')
        {
            $order->price = $req->input('price')+100;
        }

        $order->save();

        $last_order_id = $order->id;

        // order_item, from cookie

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $items_in_cart = $cart_data;

        foreach($items_in_cart as $data)
        {
            Orderitem::create([
                'order_id' => $last_order_id,
                'item_id' => $data['item_id'],
                'quantity' => $data['item_quantity'],
                'price' => $data['item_price'],
            ]);
        }


        Cookie::queue(Cookie::forget('shopping_cart'));

        $order = Order::where('id','=',$last_order_id)->get();

        return view('frontend.order_success')->with('order',$order);

    }

    function order_success()
    {
        $order = Order::where('user_id','=',Auth::user()->id)->get();

        $order_item = Orderitem::where('user_id','=',Auth::user()->id)->get();


        foreach ($order_item as $data)
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
