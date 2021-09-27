<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();

        //upload image
        $name = $request->input('judul');
        $image = $request->file('image')->getClientOriginalExtension();
        $foto_file = date('Y-m-d') . $name . "." . $image;
        $path = $request->file('image')->storeAs('public/upload/blogs', $foto_file);

        Blog::create([
            'id' => $id,
            'image' => $foto_file,
            'judul' => $request->input('judul'),
            'slug' => Str::slug($request->input('judul'), '-'),
            'category_id' => $request->input('category_id')
        ]);

        Session::flash('success', 'Blogs berhasil ditambah');
        return redirect('admin/blogs');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::latest()->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'judul'          => 'required|unique:blogs,judul,' . $blog->id,
            'isi'        => 'required',
            'category_id' => 'required'
        ]);

        //cek jika image kosong
        if ($request->file('image') == '') {

            //update tanpa image
            $blog = Blog::findOrFail($blog->id);
            $blog->update([
                'judul'          => $request->judul,
                'slug'           => Str::slug($request->judul, '-'),
                'isi'    => $request->isi,
                'category_id' => $request->category_id,
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/upload/blogs/' . $blog->image);

            //upload image
            $name = $request->input('judul');
            $image = $request->file('image')->getClientOriginalExtension();
            $foto_file = date('Y-m-d') . $name . "." . $image;
            $path = $request->file('image')->storeAs('public/upload/blogs', $foto_file);

            //update dengan image
            $blog = Blog::findOrFail($blog->id);
            $blog->update([
                'image'          => $foto_file,
                'judul'          => $request->judul,
                'slug'           => Str::slug($request->judul, '-'),
                'isi'    => $request->isi,
                'category_id' => $request->category_id,
            ]);
        }

        if ($blog) {
            //redirect dengan pesan sukses
            Session::flash('success', 'Blogs berhasil ditambah');
            return redirect('admin/blogs/');
        } else {
            //redirect dengan pesan error
            Session::flash('error', 'Blogs gagal diupdate');
            return redirect('admin/blogs/');
        }
    }

    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        Storage::disk('local')->delete('public/upload/blogs/' . $blogs->image);
        $blogs->delete();

        if($blogs){
            //redirect dengan pesan sukses
            Session::flash('success', 'Blogs gagal dihapus');
            return redirect('admin/blogs');
        }else{
            //redirect dengan pesan error
            Session::flash('success', 'Blogs gagal dihapus');
            return redirect('admin/blogs');
        }
    }
}
