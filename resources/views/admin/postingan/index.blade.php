@extends('layouts.navadmin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Daftar Blog</h5>
            <div class="table-responsive text-nowrap">

                <ul class="nav nav-pills flex-column flex-md-row mb-3 mx-4">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('blog.create') }}">Tambah Blog</a>
                    </li>
                </ul>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Blog</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Isi Blog</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Tanggal Publikasi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no=1;
                        @endphp
                        @forelse ($blogs as $blog)
                            <tr class="table-default">
                                <td>{{$no++}}</td>
                                <td>
                                    <span class="fw-medium">{{ $blog->title }}</span>
                                </td>
                                <td>{{ $blog->category ? $blog->category->name : 'Tanpa Kategori' }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>{{ Str::words($blog->content, 5) }}</td>

                                <td>
                                    @if ($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid" style="max-width: 100px;">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>{{ ucfirst($blog->status) }}</td>
                                <td>{{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d-m-Y H:i:s') : 'Belum dipublikasikan' }}</td>

                                {{-- <td>{{ $blog->published_at ? $blog->published_at->format('d-m-Y H:i:s') : 'Belum dipublikasikan' }}</td> --}}

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('blog.edit', $blog->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $blog->id }}').submit();">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <!-- Form Hapus di dalam Dropdown -->
                                            <form id="delete-form-{{ $blog->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Blog belum Tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
