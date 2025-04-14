@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Profil Pengguna</h4>
                </div>

                <div class="card-body text-center">
                    @php
                        $foto = Auth::user()->photo_profile
                            ? asset('storage/' . Auth::user()->photo_profile)
                            : asset('default-profile.png'); // Pastikan gambar default ada
                    @endphp

                    <!-- Foto Profil -->
                    <img src="{{ $foto }}" id="preview-image" class="img-thumbnail rounded-circle shadow mb-3" width="160" alt="Photo Profile">

                    <!-- Form Upload Foto -->
                    <form action="{{ url('/update-photo') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                        @csrf
                        <input type="file" name="photo_profile" id="photo_profile" class="form-control mb-2" accept="image/*" onchange="previewPhoto()" required>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-upload"></i> Ganti Foto
                        </button>
                    </form>

                    <!-- Tombol Hapus Foto -->
                    @if(Auth::user()->photo_profile)
                        <form action="{{ url('/delete-photo') }}" method="POST" class="mb-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-block">
                                <i class="fas fa-trash-alt"></i> Hapus Foto
                            </button>
                        </form>
                    @endif

                    <!-- Tombol Logout -->
                    <form action="{{ url('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>

                    <!-- Alert -->
                    @if(session('success'))
                        <div class="alert alert-success mt-4">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mt-4">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger mt-4">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Script Preview -->
<script>
    function previewPhoto() {
        const input = document.getElementById('photo_profile');
        const preview = document.getElementById('preview-image');

        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
