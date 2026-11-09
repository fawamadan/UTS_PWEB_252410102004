<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getVideoList(): array
    {
        return [
            [
                'id' => 1,
                'judul' => 'Attack on Titan',
                'genre' => 'Action, Drama, Fantasy',
                'tahun' => 2013,
                'rating' => 9.0,
                'studio' => 'Wit Studio / MAPPA',
                'sinopsis' => 'Manusia bertahan hidup di balik tembok raksasa dari serangan Titan yang memangsa mereka.',
                'cover' => 'https://cdn.myanimelist.net/images/anime/10/47347.jpg',
                'episodes' => [
                    ['id' => 1, 'judul' => 'To You, in 2000 Years', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                    ['id' => 2, 'judul' => 'That Day', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                    ['id' => 3, 'judul' => 'A Dim Light Amid Despair', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                ],
            ],
            [
                'id' => 2,
                'judul' => 'Demon Slayer',
                'genre' => 'Action, Supernatural',
                'tahun' => 2019,
                'rating' => 8.7,
                'studio' => 'ufotable',
                'sinopsis' => 'Tanjiro berjuang menjadi pembasmi iblis untuk menyelamatkan adiknya yang berubah menjadi iblis.',
                'cover' => 'https://cdn.myanimelist.net/images/anime/1286/99889.jpg',
                'episodes' => [
                    ['id' => 1, 'judul' => 'Cruelty', 'durasi' => '23 min', 'video' => 'videos/dokumen-doksli.mp4'],
                    ['id' => 2, 'judul' => 'Trainer Sakonji Urokodaki', 'durasi' => '23 min', 'video' => 'videos/dokumen-doksli.mp4'],
                ],
            ],
            [
                'id' => 3,
                'judul' => 'Jujutsu Kaisen',
                'genre' => 'Action, Supernatural',
                'tahun' => 2020,
                'rating' => 8.6,
                'studio' => 'MAPPA',
                'sinopsis' => 'Yuji Itadori menelan jari iblis dan terlibat dalam dunia penyihir jujutsu.',
                'cover' => 'https://cdn.myanimelist.net/images/anime/1171/109222.jpg',
                'episodes' => [
                    ['id' => 1, 'judul' => 'Ryomen Sukuna', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                    ['id' => 2, 'judul' => 'For Myself', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                ],
            ],
            [
                'id' => 4,
                'judul' => 'One Piece',
                'genre' => 'Action, Adventure, Comedy',
                'tahun' => 1999,
                'rating' => 8.7,
                'studio' => 'Toei Animation',
                'sinopsis' => 'Luffy dan kru topinya berlayar mencari harta karun One Piece.',
                'cover' => 'https://cdn.myanimelist.net/images/anime/6/73245.jpg',
                'episodes' => [
                    ['id' => 1, 'judul' => 'I\'m Luffy! The Man Who Will Be Pirate King!', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                    ['id' => 2, 'judul' => 'The Great Swordsman Zoro!', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                ],
            ],
            [
                'id' => 5,
                'judul' => 'Naruto Shippuden',
                'genre' => 'Action, Adventure',
                'tahun' => 2007,
                'rating' => 8.2,
                'studio' => 'Pierrot',
                'sinopsis' => 'Naruto kembali dari latihan dan menghadapi organisasi Akatsuki.',
                'cover' => 'https://cdn.myanimelist.net/images/anime/5/17407.jpg',
                'episodes' => [
                    ['id' => 1, 'judul' => 'Homecoming', 'durasi' => '23 min', 'video' => 'videos/dokumen-doksli.mp4'],
                    ['id' => 2, 'judul' => 'The Akatsuki Makes Its Move', 'durasi' => '23 min', 'video' => 'videos/dokumen-doksli.mp4'],
                ],
            ],
            [
                'id' => 6,
                'judul' => 'Fullmetal Alchemist: Brotherhood',
                'genre' => 'Action, Adventure, Drama',
                'tahun' => 2009,
                'rating' => 9.1,
                'studio' => 'Bones',
                'sinopsis' => 'Dua bersaudara alchemist mencari Philosopher\'s Stone untuk mengembalikan tubuh mereka.',
                'cover' => 'https://cdn.myanimelist.net/images/anime/1223/96541.jpg',
                'episodes' => [
                    ['id' => 1, 'judul' => 'Fullmetal Alchemist', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                    ['id' => 2, 'judul' => 'The First Day', 'durasi' => '24 min', 'video' => 'videos/dokumen-doksli.mp4'],
                ],
            ],
        ];
    }

    // ==================== LOGIN ====================
    public function login()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $username = $request->input('username', 'Guest');
        return redirect()->route('dashboard', ['username' => $username]);
    }

    // ==================== DASHBOARD ====================
    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Guest');
        $videoList = $this->getVideoList();

        return view('dashboard', compact('username', 'videoList'));
    }

    // ==================== DETAIL VIDEO ====================
    public function detail(Request $request, $id)
    {
        $username = $request->query('username', 'Guest');
        $videoList = $this->getVideoList();
        $video = collect($videoList)->firstWhere('id', (int) $id);

        if (!$video) {
            abort(404, 'Video tidak ditemukan');
        }

        $bookmarks = session()->get('bookmarks', []);
        $isBookmarked = in_array((int) $id, $bookmarks);

        return view('detail', compact('username', 'video', 'isBookmarked'));
    }

    // ==================== WATCH ====================
    public function watch(Request $request, $videoId, $episodeId)
    {
        $username = $request->query('username', 'Guest');
        $videoList = $this->getVideoList();
        $video = collect($videoList)->firstWhere('id', (int) $videoId);

        if (!$video) {
            abort(404, 'Video tidak ditemukan');
        }

        $episode = collect($video['episodes'])->firstWhere('id', (int) $episodeId);

        if (!$episode) {
            abort(404, 'Episode tidak ditemukan');
        }

        $this->recordWatchHistory((int) $videoId, $video, $episode, (int) $episodeId);

        $likes = session()->get('likes', []);
        $isLiked = in_array((int) $videoId, $likes);

        return view('watch', compact('username', 'video', 'episode', 'isLiked'));
    }

    // ==================== BOOKMARK TOGGLE ====================
    public function toggleBookmark(Request $request, $id)
    {
        $username = $request->input('username', 'Guest');
        $bookmarks = session()->get('bookmarks', []);

        if (in_array((int) $id, $bookmarks)) {
            $bookmarks = array_values(array_diff($bookmarks, [(int) $id]));
            session()->put('bookmarks', $bookmarks);
            return redirect()->back()->with('success', 'Bookmark dihapus');
        }

        $bookmarks[] = (int) $id;
        session()->put('bookmarks', $bookmarks);
        return redirect()->back()->with('success', 'Berhasil ditambahkan ke bookmark');
    }

    // ==================== LIKE TOGGLE ====================
    public function toggleLike(Request $request, $id)
    {
        $username = $request->input('username', 'Guest');
        $likes = session()->get('likes', []);

        if (in_array((int) $id, $likes)) {
            $likes = array_values(array_diff($likes, [(int) $id]));
            session()->put('likes', $likes);
            return redirect()->back()->with('success', 'Like dihapus');
        }

        $likes[] = (int) $id;
        session()->put('likes', $likes);
        return redirect()->back()->with('success', 'Video disukai');
    }

    //============Catat video yang ditonton ke session=========
    private function recordWatchHistory(int $videoId, array $video, array $episode, int $episodeId): void
    {
        $history = session()->get('history', []);

        $existingIndex = null;
        foreach ($history as $i => $h) {
            if ($h['video_id'] === $videoId) {
                $existingIndex = $i;
                break;
            }
        }

        $entry = [
            'video_id'   => $videoId,
            'judul'      => $video['judul'],
            'cover'      => $video['cover'],
            'episode_id' => $episodeId,
            'episode'    => 'Ep ' . $episodeId . ' — ' . $episode['judul'],
            'tanggal'    => now()->translatedFormat('d M Y, H:i'),
            'timestamp'  => now()->timestamp,
            'progress'   => '100%',
        ];

        if ($existingIndex !== null) {
            unset($history[$existingIndex]);
            $history = array_values($history);
        }

        array_unshift($history, $entry);

        $history = array_slice($history, 0, 10);

        session()->put('history', $history);
    }
    // ==================== PENGELOLAAN ====================
    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Guest');
        $videoList = $this->getVideoList();

        $ditonton = session()->get('history', []);

        $likedIds = session()->get('likes', []);
        $disukai = [];
        foreach ($likedIds as $lid) {
            $found = collect($videoList)->firstWhere('id', (int) $lid);
            if ($found) {
                $disukai[] = [
                    'id' => $found['id'],
                    'judul' => $found['judul'],
                    'rating' => $found['rating'],
                    'genre' => $found['genre'],
                ];
            }
        }

        $bookmarkIds = session()->get('bookmarks', []);
        $bookmark = [];
        foreach ($bookmarkIds as $bid) {
            $found = collect($videoList)->firstWhere('id', (int) $bid);
            if ($found) {
                $bookmark[] = [
                    'id' => $found['id'],
                    'judul' => $found['judul'],
                    'status' => 'Akan ditonton',
                    'total_ep' => count($found['episodes']),
                ];
            }
        }

        $data = compact('ditonton', 'disukai', 'bookmark');

        return view('pengelolaan', compact('username', 'data'));
    }

    // ==================== PROFILE ====================
    public function profile(Request $request)
    {
        $username = $request->query('username', 'Guest');

        $history = session()->get('history', []);
        $likes   = session()->get('likes', []);
        $bookmarks = session()->get('bookmarks', []);

        $totalEpisode = count($history);

        $uniqueDays = collect($history)
            ->pluck('tanggal')
            ->map(fn($t) => explode(',', $t)[0])
            ->unique()
            ->count();

        $hariAktif = max($uniqueDays, 1);

        $user = [
            'username'     => $username,
            'nama_lengkap' => ucfirst($username),
            'email'        => strtolower($username) . '@video.id',
            'bio'          => 'Pecinta drama video sejak 2010. Suka genre Action & Fantasy.',
            'avatar'       => 'images/profile_picture.jpg',
            'join'         => '01 Januari 2024',
            'level'        => 'Weeb Level: Master',
            'stats'        => [
                ['label' => 'Video Ditonton',   'value' => count($history)],   // 🔥 dari history
                ['label' => 'Episode Ditonton', 'value' => $totalEpisode],     // 🔥 dari history
                ['label' => 'Hari Aktif',       'value' => $hariAktif],        // 🔥 dari history
                ['label' => 'Favorit',          'value' => count($likes)],     // 🔥 dari likes
            ],
        ];

        return view('profile', compact('username', 'user'));
    }

    // ==================== LOGOUT ====================
    public function logout()
    {
        return redirect()->route('login');
    }
}