<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\PartCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class PartController extends Controller
{
    public function index()
    {
        $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
        $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
        // $parts = Part::all();
        $categorie = PartCategorie::all();
        return view('user.parts.index', compact('carts', 'count', 'categorie'));
    }

    public function byCategorie($id)
    {
        $parts = Part::where('category_id', $id)->get();
        $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
        $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
        return view('user.parts.app', compact('parts', 'carts', 'count'));
    }

    public function show($slug)
    {
        $part = Part::where('slug' , '=', $slug)->first();
        $related = Part::orderBy('merk', 'desc')->take(8)->get();
        $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
        $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
        if(Auth::check() == true){
            $user = session('id');
            return view('user.parts.detail', compact('part', 'related', 'carts', 'count'));
        } else {
            return view('user.parts.detail', compact('parts', 'related', 'cart', 'count'));
        }
    }
}
