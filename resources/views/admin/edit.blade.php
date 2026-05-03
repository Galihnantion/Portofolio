@extends('layouts.app')

@section('title', 'Edit Portfolio - ' . $portfolio->title)

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 style="color: var(--dark-color); margin-bottom: 1.5rem;">
                <i class="fas fa-edit"></i> Edit Portfolio: {{ $portfolio->title }}
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
                <form action="{{ route('portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Judul Project</strong></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label"><strong>Kategori</strong></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Web Development" {{ old('category', $portfolio->category) === 'Web Development' ? 'selected' : '' }}>Web Development</option>
                            <option value="Mobile App" {{ old('category', $portfolio->category) === 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                            <option value="UI/UX Design" {{ old('category', $portfolio->category) === 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                            <option value="E-Commerce" {{ old('category', $portfolio->category) === 'E-Commerce' ? 'selected' : '' }}>E-Commerce</option>
                            <option value="Lainnya" {{ old('category', $portfolio->category) === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Deskripsi</strong></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $portfolio->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="technologies" class="form-label"><strong>Teknologi (pisahkan dengan koma)</strong></label>
                        <input type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" name="technologies" value="{{ old('technologies', $portfolio->technologies) }}">
                        @error('technologies')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label"><strong>Gambar Project</strong></label>
                        @if($portfolio->image)
                            <div style="margin-bottom: 1rem;">
                                <p><strong>Gambar Sekarang:</strong></p>
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" style="max-width: 300px; border-radius: 5px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF (Max 2MB) - Kosongkan jika tidak ingin mengubah</small>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label"><strong>Link Project (URL)</strong></label>
                        <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $portfolio->link) }}">
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                        <button type="submit" class="btn btn-primary" style="flex: 1;">
                            <i class="fas fa-save"></i> Update Portfolio
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
