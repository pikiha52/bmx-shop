<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
        $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
        return view('user.cart.index', compact('carts', 'count'));
    }

    public function addToCart(Request $request)
    {
        $id_carts = Uuid::uuid4();
        $user_id = session('id');
        if (!empty($user_id)) {
            # code...
            Cart::create([
                'id' => $id_carts,
                'user_id' => $user_id,
                'parts_id' => $request->input('parts_id'),
                'price' => $request->input('price'),
                'qty_cart' => $request->input('qty_cart'),
                'total' => $request->input('total'),
                'weight' => $request->input('weight'),
            ]);

            Session::flash('success', 'Part berhasil ditambah kecart');
            return redirect('/cart');
        } else {
            Session::flash('error', 'Harap login sebelum melakukan pemesanan!');
            return redirect('/login');
        }
    }

    public function addCarts($id)
    {
        $id_carts = Uuid::uuid4()->toString();
        $user_id = session('id');

        $parts = Part::where('id', $id)->first();
        if (!empty($user_id)) {
            # code...
            Cart::create([
                'id' => $id_carts,
                'user_id' => $user_id,
                'parts_id' => $id,
                'price' => $parts->price,
                'qty_cart' => '1',
                'total' => $parts->price,
                'weight' => $parts->weight
            ]);

            Session::flash('success', 'Part berhasil ditambah kecart');
            return redirect('/cart');
        } else {
            Session::flash('error', 'Harap login sebelum melakukan pemesanan!');
            return redirect('/login');
        }
    }
}
