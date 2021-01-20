<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;


class UserController extends Controller
{
    //
    function profile()
    {
        return view('user.profile');
    }

    function address()
    {
        return view('user.address');
    }

    function updateUserProfile()
    {
        return view('frontend.update-user-profile');
    }

    function edit_address(Request $req)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->name = $req->input('name');

        $user->phone = $req->input('phone');
        $user->address = $req->input('address');
        $user->city = $req->input('city');

        $user->update();
        return redirect()->back()->with('status','Your Profile has Updated!');

    }

    function checkout()
    {
        //$order = new Order();

        //$order->user_id = $req->input('user_id');
        //$order->total = $req->input('total');

        //$order->save();

        return view('frontend.checkout');
    }


}
