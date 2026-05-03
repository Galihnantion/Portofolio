@extends('layouts.app')

@section('title', 'Buat Portfolio Baru')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 style="color: var(--dark-color); margin-bottom: 1.5rem;">
                <i class="fas fa-plus-circle"></i> Buat Portfolio Baru
            </h2>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading">Validasi Gagal!</h5>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="form-section">
                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Judul Project</strong></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan judul project" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label"><strong>Kategori</strong></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Web Development" {{ old('category') === 'Web Development' ? 'selected' : '' }}>Web Development</option>
                            <option value="Mobile App" {{ old('category') === 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                            <option value="UI/UX Design" {{ old('category') === 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                            <option value="E-Commerce" {{ old('category') === 'E-Commerce' ? 'selected' : '' }}>E-Commerce</option>
                            <option value="Lainnya" {{ old('category') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Deskripsi</strong></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Jelaskan detail project Anda..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="technologies" class="form-label"><strong>Teknologi (pisahkan dengan koma)</strong></label>
                        <input type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" name="technologies" placeholder="Laravel, PHP, MySQL, Vue.js" value="{{ old('technologies') }}">
                        @error('technologies')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"><strong>Gambar Project</strong></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF (Max 2MB)</small>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label"><strong>Link Project (URL)</strong></label>
                        <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link" placeholder="https://example.com" value="{{ old('link') }}">
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                        <button type="submit" class="btn btn-primary" style="flex: 1;">
                            <i class="fas fa-save"></i> Simpan Portfolio
                        </button>
                        <a href="{{ route('portfolio.dashboard') }}" class="btn btn-secondary" style="flex: 1;">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
