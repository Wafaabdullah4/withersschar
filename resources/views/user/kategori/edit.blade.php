@extends('layouts.navuser')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic Layout</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('categoryuser.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Method override untuk HTTP PUT -->


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="basic-default-name" value="{{ old('name', $category->name) }}"
                                    placeholder="Masukkan nama kategori" />

                                @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="basic-default-company"
                                    placeholder="Masukkan deskripsi">{{ old('description', $category->description) }}</textarea>

                                @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
