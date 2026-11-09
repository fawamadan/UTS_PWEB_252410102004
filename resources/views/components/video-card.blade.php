@props(['video', 'username'])

<a href="{{ route('video.detail', ['id' => $video['id'], 'username' => $username]) }}" class="anime-card">
    <div class="anime-cover">
        <img src="{{ $video['cover'] }}" alt="{{ $video['judul'] }}" loading="lazy">
        <span class="anime-rating">⭐ {{ $video['rating'] }}</span>
    </div>
    <div class="anime-info">
        <h3>{{ $video['judul'] }}</h3>
        <p class="anime-meta">{{ $video['tahun'] }} · {{ $video['genre'] }}</p>
    </div>
</a>