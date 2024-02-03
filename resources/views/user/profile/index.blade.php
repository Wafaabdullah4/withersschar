@extends('layouts.navuser')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Profil Pengguna</h5>
            <div class="card-body d-flex flex-column align-items-center">
                @if ($user && $user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="img-thumbnail rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <p class="text-muted">Tidak ada gambar</p>
                @endif

                <h3 class="fw-bold mb-3">{{ $user->name }}</h3>
                <div class="mb-3">
                    <strong>Email:</strong> {{ $user->email }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> {{ $user->status }}
                </div>
                <div class="mb-4">
                    <strong>Terdaftar Sejak:</strong> {{ $user->created_at->format('d M Y H:i') }}
                </div>
                <div class="btn-group">
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary mx-3"><i class="bx bx-edit-alt"></i> Edit Profil</a>
                    <button onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();" class="btn btn-danger"><i class="bx bx-trash"></i> Hapus Akun</button>
                </div>
                <!-- Form Hapus -->
                <form id="delete-form-{{ $user->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('profile.destroy', $user->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
@endsection
