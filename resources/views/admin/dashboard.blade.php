@extends('layouts.app')

@section('title', 'Admin Dashboard - Portfolio')

@section('content')
    <div class="admin-header">
        <div style="position: relative; z-index: 1;">
            <h2><i class="fas fa-tachometer-alt"></i> Admin Dashboard</h2>
            <p>Kelola semua portfolio Anda dengan mudah dan cepat</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-6">
            <h3 style="color: var(--primary); font-size: 1.5rem; font-weight: 700;">
                <i class="fas fa-list"></i> Daftar Portfolio
            </h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('portfolio.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Portfolio
            </a>
        </div>
    </div>

    @if($portfolios->count() > 0)
        <div class="admin-table">
            <div style="overflow-x: auto;">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 5%;"><i class="fas fa-hash"></i></th>
                            <th style="width: 25%;"><i class="fas fa-heading"></i> Judul</th>
                            <th style="width: 15%;"><i class="fas fa-folder"></i> Kategori</th>
                            <th style="width: 25%;"><i class="fas fa-code"></i> Teknologi</th>
                            <th style="width: 15%;"><i class="fas fa-clock"></i> Dibuat</th>
                            <th style="width: 15%; text-align: center;"><i class="fas fa-cogs"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolios as $key => $portfolio)
                            <tr style="transition: all 0.3s ease; opacity: 0;" data-index="{{ $key }}">
                                <td>
                                    <span style="background: linear-gradient(135deg, var(--primary), var(--accent)); color: var(--dark-bg); padding: 0.4rem 0.8rem; border-radius: 4px; font-weight: 700; display: inline-block;">
                                        {{ $key + 1 }}
                                    </span>
                                </td>
                                <td>
                                    <strong style="color: var(--primary);">{{ $portfolio->title }}</strong>
                                </td>
                                <td>
                                    <span class="badge-category">{{ $portfolio->category }}</span>
                                </td>
                                <td>
                                    @if($portfolio->technologies)
                                        <small style="color: var(--text-muted);">{{ Str::limit($portfolio->technologies, 25) }}</small>
                                    @else
                                        <small style="color: var(--text-muted);"><i class="fas fa-minus"></i></small>
                                    @endif
                                </td>
                                <td>
                                    <small style="color: var(--primary); font-weight: 600;">
                                        {{ $portfolio->created_at->format('d M Y') }}
                                    </small>
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('portfolio.show', $portfolio) }}" class="btn btn-sm btn-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('portfolio.edit', $portfolio) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('portfolio.destroy', $portfolio) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-warning" role="alert" style="background: rgba(255, 193, 7, 0.1) !important; border: 1px solid #ffc107 !important;">
            <i class="fas fa-exclamation-triangle" style="color: #ffc107;"></i> <strong>Belum ada portfolio!</strong> 
            <a href="{{ route('portfolio.create') }}" style="color: var(--primary); font-weight: 600; text-decoration: none;">
                Buat portfolio sekarang <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    @endif

    <script>
        // Animasi fade in bertahap pada baris table
        document.querySelectorAll('tbody tr').forEach((row) => {
            const index = parseInt(row.dataset.index);
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, index * 80);
        });
    </script>
@endsection
