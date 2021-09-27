<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        //upload image
        $name = $request->input('name');
        $image = $request->file('image')->getClientOriginalExtension();
        $foto_file = date('Y-m-d') . $name . "." . $image;
        $path = $request->file('image')->storeAs('public/upload/brand', $foto_file);

        Brand::create([
            'id' => $id,
            'image' => $foto_file,
            'name' => $request->input('name')
        ]);

        Session::flash('success', 'Brand Berhasil ditambah');
        return redirect('admin/brand');
    }

    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name'  => 'required|unique:brands,name,' . $brand->id
        ]);
        //check jika image kosong
        if ($request->file('image') == '') {
            //update data tanpa image
            $brand = Brand::findOrFail($brand->id);
            $brand->update([
                'name'   => $request->name,
            ]);
        } else {
            //hapus image lama
            Storage::disk('local')->delete('public/upload/brand/' . $brand->image);
            //upload image baru
            $name = $request->input('name');
            $image = $request->file('image')->getClientOriginalExtension();
            $foto_file = date('Y-m-d') . $name . "." . $image;
            $path = $request->file('image')->storeAs('public/upload/brand', $foto_file);

            //update dengan image baru
            $brand = Brand::findOrFail($brand->id);
            $brand->update([
                'image'  => $foto_file,
                'name'   => $request->name
            ]);
        }

        if ($brand) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Brand berhasil diupdate');
            return redirect('admin/brand');
        } else {
            //redirect dengan pesan error
            Session::flash('success', 'Brand gagal diupdate');
            return redirect('admin/brand');
        }
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        Storage::disk('local')->delete('public/upload/brand/' . $brand->image);
        $brand->delete();

        if($brand){
            //redirect dengan pesan sukses
            Session::flash('success', 'Brand berhasil dihapus');
            return redirect('admin/brand');
        }else{
            //redirect dengan pesan error
            Session::flash('success', 'Brand gagal dihapus');
            return redirect('admin/brand');
        }
    }
}
