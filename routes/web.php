<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});





Route::get('/halo', function () {
    return 'Halo, selamat datang di Laravel 13!';
});

Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s'));


/*
|--------------------------------------------------------------------------
| 3.2 Route dengan parameter
|--------------------------------------------------------------------------
*/

// Parameter wajib
Route::get('/profil/{nama}', function (string $nama) {
    return "Halo, {$nama}!";
});

// Parameter optional
Route::get('/kategori/{nama?}', function (string $nama = 'semua') {
    return "Menampilkan kategori: {$nama}";
});

// Lebih dari satu parameter
Route::get('/kelas/{kode}/mahasiswa/{nim}', function (string $kode, string $nim) {
    return "Kelas {$kode}, NIM {$nim}";
});


/*
|--------------------------------------------------------------------------
| 3.3 Pembatasan parameter (constraint)
|--------------------------------------------------------------------------
*/

// ID harus berupa angka
Route::get('/artikel/{id}', function (int $id) {
    return "Artikel nomor {$id}";
})->whereNumber('id');

// Username hanya huruf
Route::get('/pengguna/{username}', function (string $username) {
    return "Pengguna: {$username}";
})->whereAlpha('username');

// Kode : 3 lettres majuscules + 2 chiffres
Route::get('/kode/{kode}', function (string $kode) {
    return "Kode: {$kode}";
})->where('kode', '[A-Z]{3}[0-9]{2}');


/*
|--------------------------------------------------------------------------
| 3.4 Route langsung ke View dan Named Route
|--------------------------------------------------------------------------
*/

Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/kontak', function () {
    return view('kontak', [
        'email' => 'info@kampus.ac.id'
    ]);
})->name('kontak');


/*
|--------------------------------------------------------------------------
| 3.5 Route Group dan Prefix
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn () => 'Dashboard Admin')
        ->name('dashboard');

    Route::get('/pengaturan', fn () => 'Pengaturan Admin')
        ->name('pengaturan');

});


/*
|--------------------------------------------------------------------------
| 3.6 Redirect dan Fallback
|--------------------------------------------------------------------------
*/

Route::redirect('/beranda', '/');


// Fallback doit être la dernière route
Route::fallback(function () {
    return response('Halaman tidak ditemukan (custom).', 404);
});