<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pengguna.index', compact('users'));
    }



    public function create()
    {
        return view('admin.pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|max:255',
        ]);

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('pengguna', 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil disimpan!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);

        // Proses upload gambar jika ada
        $imagePath = $user->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('pengguna', 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }




// Khusus Pengguna
public function user()
{
    // Memastikan bahwa pengguna sudah login
    if (Auth::check()) {
        // Mengambil informasi pengguna yang sudah login
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    } else {
        // Pengguna belum login, bisa diarahkan ke halaman login atau sesuai kebutuhan Anda
        return redirect()->route('login');
    }
}

public function edituser($id)
{
    $user = User::findOrFail($id);
    return view('user.profile.edit', compact('user'));
}

public function updateuser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'required|string|max:255',
    ]);

    $user = User::findOrFail($id);

    // Proses upload gambar jika ada
    $imagePath = $user->image;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('pengguna', 'public');
    }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? Hash::make($request->password) : $user->password,
        'image' => $imagePath,
        'status' => $request->status,
    ]);

    return redirect()->route('profile.index')->with('success', 'User berhasil diupdate!');
}

public function destroyuser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('/')->with('success', 'User berhasil dihapus!');
}

}
