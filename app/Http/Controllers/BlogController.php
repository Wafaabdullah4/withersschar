<?php
// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
       /**
     * Menampilkan daftar semua blog.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(20);

        return view('admin.postingan.index', compact('blogs'));
    }

    public function beritautama()
    {
        // $blogs = Blog::with(['user', ''])->get();
        $user = User::all();
        $categories = Category::all();
        $blogs = Blog::latest()->paginate(20);

        return view('blog', compact('blogs', 'user', 'categories'));
    }
    //     $blogs = Blog::latest()->paginate(20);

    //     return view('blog', compact('blogs'));
    // }

    /**
     * Menampilkan formulir untuk membuat blog baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.postingan.create', compact('categories'));
    }

    /**
     * Menyimpan blog baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // tambahkan validasi untuk gambar
            'published_at' => 'nullable|date', // tambahkan validasi untuk tanggal publikasi
        ]);

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        $blog = Blog::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil disimpan!');
    }
    /**
     * Menampilkan detail blog.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Menampilkan formulir untuk mengedit blog.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();

        return view('admin.postingan.edit', compact('blog', 'categories'));
    }

    /**
     * Mengupdate blog ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $blog = Blog::findOrFail($id);

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog berhasil diupdate!');
    }

    /**
     * Menghapus blog dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog berhasil dihapus!');
    }
}
