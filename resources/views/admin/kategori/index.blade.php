@extends('layouts.navadmin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Daftar Kategori</h5>
            <div class="table-responsive text-nowrap">

                <ul class="nav nav-pills flex-column flex-md-row mb-3 mx-4">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('category.create') }}">Tambah Kategori</a>
                    </li>
                </ul>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($categories as $category)
                            <tr class="table-default">
                                <td>
                                    <span class="fw-medium">{{ $category->name }}</span>
                                </td>
                                <td>{{ $category->description }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('category.edit', $category->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <!-- Form Hapus di dalam Dropdown -->
                                            <form id="delete-form-{{ $category->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Kategori belum Tersedia.
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
