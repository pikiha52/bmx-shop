<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Part;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        if (Auth::check()) {
            $user = User::where('id', session('id'))->first();
            $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
            $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
            $orders = Order::leftjoin('parts', 'orders.parts_id', '=', 'parts.id')
                ->leftjoin('brands', 'parts.brand_id', '=', 'brands.id')
                ->select(
                    'orders.*',
                    'parts.image', 'parts.merk',
                    'brands.name'
                )->orderByDesc('created_at')->limit(5)->get();

            return view('user.profile.index', compact('user', 'carts', 'count', 'orders'));
        }
    }
}
