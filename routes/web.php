<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Kategori\KategoriIndex;
use App\Livewire\Kategori\KategoriCreate;
use App\Livewire\Kategori\KategoriEdit;

use App\Livewire\Kota\KotaIndex; // Tambahkan ini
use App\Livewire\Kota\KotaCreate; // Tambahkan ini
use App\Livewire\Kota\KotaEdit; // Tambahkan ini

use App\Livewire\Wisata\WisataIndex; // Tambahkan ini
use App\Livewire\Wisata\WisataCreate; // Tambahkan ini
use App\Livewire\Wisata\WisataEdit; // Tambahkan ini
use App\Livewire\Wisata\WisataDetail; // Tambahkan ini
use App\Livewire\Wisata\WisataPopuler; // Tambahkan ini
use App\Livewire\AdminDashboard as AdminDashboardLivewire; // **PERUBAHAN NAMA**

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route halaman utama yang menampilkan daftar wisata populer
Route::get('/', WisataPopuler::class)->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Ubah route dashboard untuk menggunakan komponen Livewire yang diganti nama
    Route::get('dashboard', AdminDashboardLivewire::class)->name('dashboard'); // **PERUBAHAN NAMA**

    // --- ROUTE UNTUK KATEGORI (CRUD) ---
    Route::get('/kategori', KategoriIndex::class)->name('kategori.index');
    Route::get('/kategori/create', KategoriCreate::class)->name('kategori.create');
    Route::get('/kategori/{kategori}/edit', KategoriEdit::class)->name('kategori.edit');

    // --- ROUTE UNTUK KOTA (CRUD) ---
    Route::get('/kota', KotaIndex::class)->name('kota.index');
    Route::get('/kota/create', KotaCreate::class)->name('kota.create');
    Route::get('/kota/{kota}/edit', KotaEdit::class)->name('kota.edit');

    // --- ROUTE UNTUK WISATA (CRUD) ---
    Route::get('/wisata', WisataIndex::class)->name('wisata.index'); // Daftar & Filter
    Route::get('/wisata/create', WisataCreate::class)->name('wisata.create');
    Route::get('/wisata/{wisata}/edit', WisataEdit::class)->name('wisata.edit');
});

// Route untuk detail wisata (bisa diakses tanpa login)
Route::get('/wisata/{wisata}', WisataDetail::class)->name('wisata.detail');

// --- ROUTE UNTUK HALAMAN AUTENTIKASI DAN PROFIL (DARI BREEZE) ---
require __DIR__.'/auth.php';
require __DIR__.'/profile.php';