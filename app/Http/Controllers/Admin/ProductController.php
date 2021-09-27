<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Part;
use App\Models\PartCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        return view('admin.product.index', compact('parts'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = PartCategorie::all();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        $this->validate($request, [
            'image'          => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'brand_id'          => 'required',
            'merk'          => 'required',
            'category'       => 'required',
            'price'       => 'required',
            'weight'       => 'required',
            'details'        => 'required',
            'qty'           => 'required',
        ]);

        //upload image
        $name = $request->input('name');
        $image = $request->file('image')->getClientOriginalExtension();
        $foto_file = date('Y-m-d') . $name . "." . $image;
        $path = $request->file('image')->storeAs('public/upload/part', $foto_file);

        //save to DB
        $parts = Part::create([
            'id'    => $id,
            'image'          => $foto_file,
            'brand_id'          => $request->brand_id,
            'merk'          => $request->merk,
            'slug'           => Str::slug($request->merk, '-'),
            'category_id'          => $request->category,
            'price'          => $request->price,
            'weight'          => $request->weight,
            'details'    => $request->details,
            'qty'       => $request->qty,
        ]);

        if ($parts) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Part berhasil ditambah');
            return redirect('admin/product');
        } else {
            //redirect dengan pesan sukses
            Session::flash('success', 'Part berhasil ditambah');
            return redirect('admin/product');
        }
    }

    public function edit(Part $part)
    {
        $brands     = Brand::latest()->get();
        $categories = PartCategorie::latest()->get();
        return view('admin.product.edit', compact('part', 'categories', 'brands'));
    }

    public function update(Request $request, Part $part)
    {
        $this->validate($request, [
            'merk'  => 'required|unique:parts,merk,' . $part->id
        ]);

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $part = Part::findOrFail($part->id);
            $part->update([
                'merk'   => $request->merk,
                'brand_id'   => $request->brand_id,
                'category'   => $request->category,
                'price'   => $request->price,
                'qty'   => $request->qty,
                'weight'   => $request->weight,
                'details'   => $request->details,
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/upload/part/' . $part->image);

            //upload image
            $name = $request->input('name');
            $image = $request->file('image')->getClientOriginalExtension();
            $foto_file = date('Y-m-d') . $name . "." . $image;
            $path = $request->file('image')->storeAs('public/upload/part', $foto_file);

            //update dengan image baru
            $part = Part::findOrFail($part->id);
            $part->update([
                'image'  => $foto_file,
                'merk'   => $request->merk,
                'slug'       => Str::slug($request->merk, '-'),
                'brand_id'   => $request->brand_id,
                'category'   => $request->category,
                'price'   => $request->price,
                'qty'   => $request->qty,
                'weight'   => $request->wight,
                'details'   => $request->details
            ]);
        }


        if ($part) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Part berhasil diupdate');
            return redirect('admin/product');
        } else {
            //redirect dengan pesan error
            Session::flash('success', 'Part gagal diupdate');
            return redirect('admin/product');
        }
    }

    public function destroy($id)
    {
        $part = Part::findOrFail($id);
        $image = Storage::disk('local')->delete('public/upload/part/' . $part->image);
        $part->delete();

        if ($part) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Part berhasil dihapus');
            return redirect('admin/product');
        } else {
            //redirect dengan pesan error
            Session::flash('success', 'Part gagal dihapus');
            return redirect('admin/product');
        }
    }

    public function ckeditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('pages'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('pages/' . $fileName);
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
            echo $response;
        }
    }
}
