@extends('layouts.navadmin')

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
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-title">Judul Blog</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="basic-default-title" placeholder="Masukkan judul blog" />

                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-category">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id" id="basic-default-category">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-content">Isi Blog</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="basic-default-content"
                                        placeholder="Masukkan isi blog"></textarea>

                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-image">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="basic-default-image" onchange="displayImage(this)" />

                                    <div class="mt-2">
                                        <img src="" alt="Preview" id="image-preview"
                                            style="max-width: 100%; max-height: 200px; display: none;">
                                    </div>

                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <script>
                                function displayImage(input) {
                                    var preview = document.getElementById('image-preview');
                                    var file = input.files[0];

                                    if (file) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            preview.src = e.target.result;
                                            preview.style.display = 'block';
                                        }
                                        reader.readAsDataURL(file);
                                    } else {
                                        preview.src = '';
                                        preview.style.display = 'none';
                                    }
                                }
                            </script>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-published_at">Tanggal
                                    Publikasi</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local"
                                        class="form-control @error('published_at') is-invalid @enderror" name="published_at"
                                        id="basic-default-published_at" />

                                    @error('published_at')
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
