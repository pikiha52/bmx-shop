<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Part;
use App\Models\Slide;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $carts = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->get();
        $count = Cart::leftjoin('parts', 'carts.parts_id', '=', 'parts.id')->where('user_id', session('id'))->count();
        $slides = Slide::all();
        $parts = Part::all();

        return view('user.home.index', compact('slides', 'parts', 'carts', 'count'));
    }
}
