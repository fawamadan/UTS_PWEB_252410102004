<img width="1847" height="942" alt="image" src="https://github.com/user-attachments/assets/6ce749e9-883a-4ce8-8355-a26c5c8e086e" />
# UTS PWEB — VidStream

Aplikasi web streaming video drama yang dibangun dengan **Laravel murni (MVC + Blade)** tanpa database dan tanpa starter kit. Dibuat untuk memenuhi UTS Praktikum Pemrograman Web.

---

## 👤 Identitas

- **Nama** : [MOHAMAD MADANUL FAWAID]
- **NIM** : [252410102004]
- **Kelas** : [PWEB - B]

---

## 📖 Penjelasan Singkat

**VidStream** adalah aplikasi web untuk **menonton video drama secara streaming**. Aplikasi ini memiliki alur sederhana: user login dengan username (tanpa validasi), lalu masuk ke dashboard yang menampilkan daftar video beserta cover dan judulnya. Dari dashboard, user bisa membuka **halaman detail video** untuk melihat sinopsis dan daftar episode, lalu **menonton episode** yang dipilih langsung di halaman watch.

Aplikasi juga dilengkapi halaman **Pengelolaan** untuk mengelola tontonan user, yang terdiri dari:
- **Riwayat Ditonton** — otomatis tercatat setiap kali user membuka episode
- **Video Disukai** — dari tombol like di halaman watch
- **Bookmark** — dari tombol bookmark di halaman detail video

Data disimpan di **session** sebagai simulasi, karena UTS ini tidak menggunakan database. Halaman **Profil** menampilkan avatar, bio, dan statistik (video ditonton, episode, hari aktif, favorit) yang dihitung dinamis dari session.

---

## 🛠️ Teknologi

| Komponen | Teknologi |
|----------|-----------|
| Framework | Laravel 11 |
| Arsitektur | MVC (Model-View-Controller) |
| Templating | Blade |
| Styling | CSS terpisah (`public/css/style.css`) |
| Data | Array statis + Session (tanpa database) |
| Aset | Gambar lokal di `public/images/` |

---

## 📁 Struktur Folder
