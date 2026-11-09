@extends('layouts.app')

@section('title', 'Nonton ' . $video['judul'] . ' - Dramooq')

@section('content')
<a href="{{ route('video.detail', ['id' => $video['id'], 'username' => $username]) }}" class="back-link">← Kembali ke Daftar Episode</a>

@if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="watch-wrapper">
    <div class="video-player">
        <video controls playsinline>
            <source src="{{ asset($episode['video']) }}" type="video/mp4">
            Browser kamu tidak mendukung video.
        </video>
    </div>

    <div class="watch-info">
        <h1>{{ $video['judul'] }} — Episode {{ $episode['id'] }}</h1>
        <h2 class="episode-title">{{ $episode['judul'] }}</h2>
        <div class="watch-meta">
            <span class="tag">⏱ {{ $episode['durasi'] }}</span>
            <span class="tag">🎬 {{ $video['studio'] }}</span>
            <span class="tag">⭐ {{ $video['rating'] }}</span>
        </div>

        {{-- Tombol Like --}}
        <form action="{{ route('video.like', ['id' => $video['id']]) }}" method="POST" class="like-form">
            @csrf
            <input type="hidden" name="username" value="{{ $username }}">
            <button type="submit" class="btn-like {{ $isLiked ? 'active' : '' }}">
                {{ $isLiked ? '❤️ Disukai' : '🤍 Suka Video Ini' }}
            </button>
        </form>

        <p class="watch-desc">Sedang ditonton oleh <strong>{{ $username }}</strong>. Selamat menonton!</p>
    </div>
</div>
@endsection