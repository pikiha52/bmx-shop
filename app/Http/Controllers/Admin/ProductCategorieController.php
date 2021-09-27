<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProductCategorieController extends Controller
{
    public function index()
    {
        $categories = PartCategorie::all();
        return view('admin.product-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.product-category.create');
    }

    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'nama_kategori'  => 'required|unique:categories',
        ]);

        //upload image
        $name = $request->input('name');
        $image = $request->file('image')->getClientOriginalExtension();
        $foto_file = date('Y-m-d') . $name . "." . $image;
        $path = $request->file('image')->storeAs('public/upload/part-categorie', $foto_file);

        //save to DB
        $category = PartCategorie::create([
            'id' => $id,
            'image'  => $foto_file,
            'nama_kategori'   => $request->nama_kategori,
            'slug'   => Str::slug($request->nama_kategori, '-')
        ]);

        if ($category) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Part Categori berhasil ditambah');
            return redirect('admin/product-categorie');
        } else {
            //redirect dengan pesan sukses
            Session::flash('error', 'Part Categori gagal ditambah');
            return redirect('admin/product-categorie');
        }
    }

    public function edit($id)
    {
        $category = PartCategorie::where('id', $id)->first();
        // return $category;
        // die;
        return view('admin.product-category.edit', compact('category'));
    }

    public function update(Request $request, PartCategorie $category)
    {
        $this->validate($request, [
            'name'  => 'required|unique:categories,name,' . $category->id
        ]);

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $category = PartCategorie::findOrFail($category->id);
            $category->update([
                'name'   => $request->name,
                'slug'   => Str::slug($request->name, '-')
            ]);
        } else {

            //hapus image lama
            PartCategorie::disk('local')->delete('public/categorie-part/' . $category->image);

            //upload image
            $name = $request->input('name');
            $image = $request->file('image')->getClientOriginalExtension();
            $foto_file = date('Y-m-d') . $name . "." . $image;
            $path = $request->file('image')->storeAs('public/upload/part-categorie', $foto_file);

            //update dengan image baru
            $category = PartCategorie::findOrFail($category->id);
            $category->update([
                'image'  => $foto_file,
                'name'   => $request->name,
                'slug'   => Str::slug($request->name, '-')
            ]);
        }

        if ($category) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Part Categori berhasil diupdate');
            return redirect('admin/product-categorie');
        } else {
            //redirect dengan pesan sukses
            Session::flash('error', 'Part Categori gagal diupdate');
            return redirect('admin/product-categorie');
        }
    }
}
