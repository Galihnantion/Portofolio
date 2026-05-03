@extends('layouts.app')

@section('title', $portfolio->title . ' - Detail Portfolio')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="{{ route('portfolio.index') }}" class="btn btn-secondary mb-4">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                @if($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" style="width: 100%; height: 400px; object-fit: cover;">
                @else
                    <div style="width: 100%; height: 400px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 4rem;">
                        <i class="fas fa-images"></i>
                    </div>
                @endif

                <div style="padding: 2rem;">
                    <div class="portfolio-category" style="margin-bottom: 1rem;">{{ $portfolio->category }}</div>
                    
                    <h1 style="color: var(--dark-color); margin-bottom: 1rem;">{{ $portfolio->title }}</h1>
                    
                    <div style="background: #f7fafc; padding: 1rem; border-radius: 5px; margin-bottom: 2rem;">
                        <h5 style="color: var(--dark-color); margin-bottom: 0.5rem;">Deskripsi Singkat</h5>
                        <p style="color: #666; margin-bottom: 0;">{{ $portfolio->description }}</p>
                    </div>

                    @if($portfolio->technologies)
                        <div style="margin-bottom: 2rem;">
                            <h5 style="color: var(--dark-color); margin-bottom: 1rem;">Teknologi yang Digunakan</h5>
                            <div class="portfolio-technologies">
                                @foreach(explode(',', $portfolio->technologies) as $tech)
                                    <span class="tech-badge"><i class="fas fa-code"></i> {{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div style="border-top: 1px solid #e2e8f0; padding-top: 1.5rem; margin-top: 2rem;">
                        <p style="color: #999; font-size: 0.9rem; margin-bottom: 1rem;">
                            <i class="fas fa-calendar"></i> Dipublikasikan: {{ $portfolio->created_at->format('d F Y') }}
                        </p>

                        <div style="display: flex; gap: 1rem;">
                            @if($portfolio->link)
                                <a href="{{ $portfolio->link }}" target="_blank" class="btn btn-primary" style="flex: 1;">
                                    <i class="fas fa-external-link-alt"></i> Kunjungi Project
                                </a>
                            @endif
                            <a href="{{ route('portfolio.index') }}" class="btn btn-secondary" style="flex: 1;">
                                <i class="fas fa-arrow-left"></i> Kembali ke Portfolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
