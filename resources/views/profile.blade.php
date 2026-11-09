@extends('layouts.app')

@section('title', 'Profil - Dramooq')

@section('content')
<div class="profile-wrapper">
    <div class="profile-card">
        <img src="{{ asset($user['avatar']) }}" alt="Avatar {{ $user['username'] }}" class="profile-avatar">
        <h1>{{ $user['nama_lengkap'] }}</h1>
        <p class="profile-level">{{ $user['level'] }}</p>

        <div class="profile-bio">
            <p>{{ $user['bio'] }}</p>
        </div>

        <div class="profile-meta">
            <p><strong>Bergabung:</strong> {{ $user['join'] }}</p>
        </div>
    </div>

    <div class="profile-stats">
        <h2>📊 Statistik</h2>
        <div class="stats-grid">
            @foreach ($user['stats'] as $stat)
                <div class="stat-card">
                    <span class="stat-value">{{ $stat['value'] }}</span>
                    <span class="stat-label">{{ $stat['label'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection