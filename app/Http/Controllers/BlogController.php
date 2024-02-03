<?php

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
        $user= User::all();

        return view('admin.postingan.index', compact('blogs','user'));
    }

    public function beritautama()
    {
        $categories = Category::all();
        $user = User::all();
        $blogs = Blog::latest()->paginate(20);

        return view('blog', compact('blogs', 'categories', 'user'));
    }

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
        $this->validateBlogRequest($request);

        $imagePath = $this->uploadImage($request);

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
        $this->validateBlogRequest($request);

        $blog = Blog::findOrFail($id);

        $imagePath = $this->uploadImage($request);

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imagePath ?: $blog->image, // Update image only if a new image is uploaded
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

    /**
     * Validate the blog request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     */
    private function validateBlogRequest(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'nullable|date',
        ]);
    }

    /**
     * Upload the image.
     *
     * @param \Illuminate\Http\Request  $request
     * @return string|null
     */
    private function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('blog_images', 'public');
        }

        return null;
    }
}
