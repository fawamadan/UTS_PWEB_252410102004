@extends('layouts.app')

@section('title', 'Pengelolaan - Dramooq')

@section('content')
<section class="hero small">
    <h1>📂 Pengelolaan <span class="text-accent">{{ $username }}</span></h1>
    <p>Kelola video yang pernah kamu tonton, sukai, dan bookmark.</p>
</section>

{{-- Riwayat Ditonton --}}
<section class="section">
    <div class="section-header">
        <h2>✅ Riwayat Ditonton</h2>
        <span class="badge">{{ count($data['ditonton']) }} Item</span>
    </div>

    @if (count($data['ditonton']) > 0)
        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Episode</th>
                        <th>Tanggal</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['ditonton'] as $item)
                        <tr>
                            <td>
                                <a href="{{ route('video.detail', ['id' => $item['video_id'], 'username' => $username]) }}" class="link-judul">
                                    {{ $item['judul'] }}
                                </a>
                            </td>
                            <td>{{ $item['episode'] }}</td>
                            <td>{{ $item['tanggal'] }}</td>
                            <td><span class="progress-badge">{{ $item['progress'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="empty-state">Belum ada riwayat. Tonton episode dulu supaya tercatat di sini. 🎬</p>
    @endif
</section>

{{-- Disukai (dari session like) --}}
<section class="section">
    <div class="section-header">
        <h2>❤️ Video Disukai</h2>
        <span class="badge">{{ count($data['disukai']) }} Item</span>
    </div>
    @if (count($data['disukai']) > 0)
        <div class="card-grid">
            @foreach ($data['disukai'] as $item)
                <a href="{{ route('video.detail', ['id' => $item['id'], 'username' => $username]) }}" class="mini-card link-card">
                    <h4>{{ $item['judul'] }}</h4>
                    <p>⭐ {{ $item['rating'] }} · {{ $item['genre'] }}</p>
                </a>
            @endforeach
        </div>
    @else
        <p class="empty-state">Belum ada video yang disukai. Tekan tombol 🤍 di halaman nonton.</p>
    @endif
</section>

{{-- Bookmark (dari session bookmark) --}}
<section class="section">
    <div class="section-header">
        <h2>🔖 Bookmark</h2>
        <span class="badge">{{ count($data['bookmark']) }} Item</span>
    </div>
    @if (count($data['bookmark']) > 0)
        <div class="card-grid">
            @foreach ($data['bookmark'] as $item)
                <a href="{{ route('video.detail', ['id' => $item['id'], 'username' => $username]) }}" class="mini-card bookmark link-card">
                    <h4>{{ $item['judul'] }}</h4>
                    <p>Status: {{ $item['status'] }}</p>
                    <p>Total Episode: {{ $item['total_ep'] }}</p>
                </a>
            @endforeach
        </div>
    @else
        <p class="empty-state">Belum ada bookmark. Tekan tombol 🔖 di halaman detail video.</p>
    @endif
</section>
@endsection