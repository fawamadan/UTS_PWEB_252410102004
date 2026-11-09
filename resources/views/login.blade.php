@extends('layouts.app')

@section('title', 'Login - Dramooq')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <h1>🎬 Dramooq</h1>
            <p>Masuk untuk mulai menonton video drama favoritmu</p>
        </div>

        <form action="{{ route('login.process') }}" method="POST" class="login-form">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan username..." autocomplete="off">
            </div>
            <button type="submit" class="btn-primary">Masuk</button>
        </form>
    </div>
</div>
@endsection