@extends('layouts.app')

@section('title', $video['judul'] . ' - Dramooq')

@section('content')
<a href="{{ route('dashboard', ['username' => $username]) }}" class="back-link">← Kembali ke Dashboard</a>

@if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="detail-wrapper">
    <div class="detail-cover">
        <img src="{{ $video['cover'] }}" alt="{{ $video['judul'] }}">
    </div>

    <div class="detail-info">
        <h1>{{ $video['judul'] }}</h1>
        <div class="detail-tags">
            <span class="tag">⭐ {{ $video['rating'] }}</span>
            <span class="tag">📅 {{ $video['tahun'] }}</span>
            <span class="tag">🎨 {{ $video['studio'] }}</span>
        </div>
        <p class="detail-genre"><strong>Genre:</strong> {{ $video['genre'] }}</p>
        <p class="detail-sinopsis">{{ $video['sinopsis'] }}</p>

        {{-- Tombol Bookmark --}}
        <form action="{{ route('video.bookmark', ['id' => $video['id']]) }}" method="POST" class="bookmark-form">
            @csrf
            <input type="hidden" name="username" value="{{ $username }}">
            <button type="submit" class="btn-bookmark {{ $isBookmarked ? 'active' : '' }}">
                {{ $isBookmarked ? '🔖 Bookmarked' : '🔖 Tambah ke Bookmark' }}
            </button>
        </form>
    </div>
</div>

<section class="section">
    <div class="section-header">
        <h2>📺 Daftar Episode</h2>
        <span class="badge">{{ count($video['episodes']) }} Episode</span>
    </div>

    <div class="episode-list">
        @foreach ($video['episodes'] as $ep)
            <a href="{{ route('video.watch', ['videoId' => $video['id'], 'episodeId' => $ep['id'], 'username' => $username]) }}" class="episode-item">
                <div class="episode-num">{{ $ep['id'] }}</div>
                <div class="episode-info">
                    <h4>{{ $ep['judul'] }}</h4>
                    <span class="episode-durasi">⏱ {{ $ep['durasi'] }}</span>
                </div>
                <span class="episode-play">▶</span>
            </a>
        @endforeach
    </div>
</section>
@endsection