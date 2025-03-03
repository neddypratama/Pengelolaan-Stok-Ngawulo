<?php

use App\Http\Controllers\GoogleController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Profile;
use App\Livewire\Auth\Register;
use App\Livewire\Master\DataBarang;
use App\Livewire\Master\DetailBarang;
use App\Livewire\Master\EditBarang;
use App\Livewire\Master\EditJenis;
use App\Livewire\Master\EditSatuan;
use App\Livewire\Master\EntriBarang;
use App\Livewire\Master\EntriJenis;
use App\Livewire\Master\EntriSatuan;
use App\Livewire\Master\JenisBarang;
use App\Livewire\Master\Satuan;
use App\Livewire\Transaksi\BarangKeluar;
use App\Livewire\Transaksi\BarangMasuk;
use App\Livewire\Transaksi\EditKeluar;
use App\Livewire\Transaksi\EditMasuk;
use App\Livewire\Transaksi\EntriKeluar;
use App\Livewire\Transaksi\EntriMasuk;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes(['login' => false, 'register' => false, 'verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

Route::middleware('guest')->group(function() {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/auth-google-redirect', [GoogleController::class, 'google_redirect'])->name('google-redirect');
    Route::get('/auth-google-callback', [GoogleController::class, 'google_callback'])->name('google-callback');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    
    Route::get('/data-barang', DataBarang::class)->name('data-barang');
    Route::get('/entri-barang', EntriBarang::class)->name('entri-barang');
    Route::get('/barang/{id}', DetailBarang::class)->name('detail-barang');
    Route::get('/edit-barang/{id}', EditBarang::class)->name('edit-barang');
    
    Route::get('/jenis-barang', JenisBarang::class)->name('jenis-barang');
    Route::get('/entri-jenis', EntriJenis::class)->name('entri-jenis');
    Route::get('/edit-jenis/{id}', EditJenis::class)->name('edit-jenis');
    
    Route::get('/satuan', Satuan::class)->name('satuan');
    Route::get('/entri-satuan', EntriSatuan::class)->name('entri-satuan');
    Route::get('/edit-satuan/{id}', EditSatuan::class)->name('edit-satuan');

    Route::get('/barang-masuk', BarangMasuk::class)->name('barang-masuk');
    Route::get('/entri-masuk', EntriMasuk::class)->name('entri-masuk');
    Route::get('/edit-masuk/{id}', EditMasuk::class)->name('edit-masuk');
    
    Route::get('/barang-keluar', BarangKeluar::class)->name('barang-keluar');
    Route::get('/entri-keluar', EntriKeluar::class)->name('entri-keluar');
    Route::get('/edit-keluar/{id}', EditKeluar::class)->name('edit-keluar');

    Route::get('/get-barang/{id}', function ($id) {
        $barang = Barang::with('satuan')->find($id);
        if (!$barang) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
        return response()->json([
            'stok' => $barang->stok_barang,
            'satuan' => $barang->satuan ? $barang->satuan->nama_satuan : '-'
        ]);
    });
});
