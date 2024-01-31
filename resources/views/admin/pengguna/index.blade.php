@extends('layouts.navadmin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Daftar Pengguna</h5>
            <div class="table-responsive text-nowrap">

                <ul class="nav nav-pills flex-column flex-md-row mb-3 mx-4">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('users.create') }}">Tambah Pengguna</a>
                    </li>
                </ul>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no=1;
                        @endphp
                        @forelse ($users as $user)
                        @if ($user->usertype == 'user')
                            <tr class="table-default">
                                <td>{{$no++}}</td>

                                <td>
                                    @if ($user->image)
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="img-thumbnail w-px-40 h-auto rounded-circle">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>

                                <td>
                                    <span class="fw-medium">{{ $user->name }}</span>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <!-- Form Hapus di dalam Dropdown -->
                                            <form id="delete-form-{{ $user->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Pengguna belum Tersedia.
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
