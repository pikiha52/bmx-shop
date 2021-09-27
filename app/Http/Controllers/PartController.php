<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\PartCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PartController extends Controller
{
    public function index()
    {
        // $parts = Part::all();
        $categorie = PartCategorie::all();
        return view('user.parts.index', compact('categorie'));
    }

    public function byCategorie($id)
    {
        $parts = Part::where('category_id', $id)->get();
        return view('user.parts.app', compact('parts'));
    }

    public function show($slug)
    {
        $part = Part::where('slug' , '=', $slug)->first();
        $related = Part::orderBy('merk', 'desc')->take(8)->get();
        if(Auth::check() == true){
            $user = session('id');
            
            return view('user.parts.detail', compact('user', 'related', 'part'));
        } else {
            return view('user.parts.detail', compact('part', 'related'));
        }
    }
}
