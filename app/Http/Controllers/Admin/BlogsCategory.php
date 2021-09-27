<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory as CategoryBlogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class BlogsCategory extends Controller
{
    public function index()
    {
        $categories = CategoryBlogs::all();
        return view('admin.blog-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-category.create');
    }

    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        //upload image
        $name = $request->input('name');
        $image = $request->file('image')->getClientOriginalExtension();
        $foto_file = date('Y-m-d') . $name . "." . $image;
        $path = $request->file('image')->storeAs('public/upload/part', $foto_file);

        CategoryBlogs::create([
            'id' => $id,
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('nama')),
            'image' => $foto_file
        ]);

        Session::flash('success', 'Category Blogs Berhasil di Tambah');
        return redirect('/admin/category-blogs');
    }

    public function edit($id)
    {
        $category = CategoryBlogs::where('id', $id);
        return view('admin.blog-category.edit', compact('category'));
    }

    public function update(Request $request, CategoryBlogs $category)
    {
        $this->validate($request, [
            'name'  => 'required|unique:category_blogs,name,' . $category->id
        ]);

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $category = CategoryBlogs::findOrFail($category->id);
            $category->update([
                'name'   => $request->name,
                'slug'   => Str::slug($request->name, '-')
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/upload/blogs/category/' . $category->image);

            //upload image
            $name = $request->input('name');
            $image = $request->file('image')->getClientOriginalExtension();
            $foto_file = date('Y-m-d') . $name . "." . $image;
            $path = $request->file('image')->storeAs('public/upload/blogs/category', $foto_file);

            //update dengan image baru
            $category = CategoryBlogs::findOrFail($category->id);
            $category->update([
                'image'  => $foto_file,
                'name'   => $request->name,
                'slug'   => Str::slug($request->name, '-')
            ]);
        }

        if ($category) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Category Blogs berhasil diubah');
            return redirect('admin/category-blogs');
        } else {
            //redirect dengan pesan error
            Session::flash('error', 'Category Blogs gagal diubah');
            return redirect('admin/category-blogs');
        }
    }

    public function destroy($id)
    {
        $category = CategoryBlogs::findOrFail($id);
        Storage::disk('local')->delete('public/upload/blogs/category/' . $category->image);
        $category->delete();

        if ($category) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Brand berhasil dihapus');
            return redirect('admin/category-blogs');
        } else {
            //redirect dengan pesan error
            Session::flash('success', 'Brand gagal dihapus');
            return redirect('admin/category-blogs');
        }
    }
}
