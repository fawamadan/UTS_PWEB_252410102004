<nav class="navbar">
    <div class="nav-container">
        <a href="{{ route('dashboard', ['username' => $username ?? 'Guest']) }}" class="nav-brand">
            <span class="brand-icon">🎬</span> Dramooq
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('dashboard', ['username' => $username ?? 'Guest']) }}">Dashboard</a></li>
            <li><a href="{{ route('pengelolaan', ['username' => $username ?? 'Guest']) }}">Pengelolaan</a></li>
            <li><a href="{{ route('profile', ['username' => $username ?? 'Guest']) }}">Profil</a></li>
            <li><a href="{{ route('logout') }}" class="btn-logout">Logout</a></li>
        </ul>
    </div>
</nav>