@extends('layouts.app')

@section('title', 'Dashboard - Dramooq')

@section('content')
<section class="hero">
    <h1>Selamat Datang, <span class="text-accent">{{ $username }}</span>! 👋</h1>
    <p>Temukan video favoritmu dan mulai marathon hari ini.</p>
</section>

<section class="section">
    <div class="section-header">
        <h2>🔥 Pilihan Video Drama</h2>
        <span class="badge">{{ count($videoList) }} Video</span>
    </div>

    <div class="anime-grid">
        @foreach ($videoList as $video)
            <x-video-card :video="$video" :username="$username" />
        @endforeach
    </div>
</section>
@endsection