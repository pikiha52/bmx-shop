<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'details' => 'required'
        ]);

        //upload image
        $name = 'slides';
        $image = $request->file('image')->getClientOriginalExtension();
        $foto_file = date('Y-m-d') . $name . "." . $image;
        $path = $request->file('image')->storeAs('public/upload/slide', $foto_file);

        Slide::create([
            'id' => $id,
            'image' => $foto_file,
            'details' => $request->details
        ]);

        Session::flash('success', 'Side berhasil ditambah');
        return redirect('admin/slide');
    }

    public function edit($id)
    {
        $slide = Slide::where('id', $id)->first();
        return view('admin.slide.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $this->validate($request, [
            'details'        => 'required',
        ]);

        //cek jika image kosong
        if ($request->file('image') == '') {

            //update tanpa image
            $slide = Slide::findOrFail($slide->id);
            $slide->update([
                'details'    => $request->details,
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/upload/slide/' . $slide->image);

            //upload image baru
            $name = 'slides';
            $image = $request->file('image')->getClientOriginalExtension();
            $foto_file = date('Y-m-d') . $name . "." . $image;
            $path = $request->file('image')->storeAs('public/upload/slide', $foto_file);

            //update dengan image
            $slide = Slide::findOrFail($slide->id);
            $slide->update([
                'image'          => $foto_file,
                'details'    => $request->details,
            ]);
        }

        if ($slide) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Slide berhasil diupdate');
            return redirect('admin/slide');
        } else {
            //redirect dengan pesan error
            Session::flash('error', 'Slide gagal diupdate');
            return redirect('admin/slide');
        }
    }
}
