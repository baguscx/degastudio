<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/send-wa', function(){
    $response = Http::withHeaders([
        'Authorization' => 'w_y+F4R+44S5Kdr!nG2+'
    ])->post('https://api.fonnte.com/send', [
        'target' => '082257367240',
        'message' => 'test message',
    ]);

    dd(json_decode($response, true));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('welcome');
    })->name('admin');
    Route::get('/paket',[PaketController::class, 'index'])->name('paket');
    Route::delete('/paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
    Route::get('/add-paket',[PaketController::class, 'create'])->name('add-paket');
    Route::post('/add-paket',[PaketController::class, 'store'])->name('store-paket');
    Route::get('/pesanan',[PesanController::class, 'pesanan'])->name('daftar.pesanan');
    Route::get('/detail/{id}',[HistoryController::class, 'bayar'])->name('detail.pesanan');
    Route::post('/acc/{id}',[HistoryController::class, 'accbayar'])->name('acc.bayar');
});

Route::middleware('auth', 'role:user')->group(function () {
    Route::get('/user', function () {
        return redirect()->route('welcome');
    })->name('user');
    Route::get('/pesan',[PesanController::class, 'index'])->name('pesan');
    Route::post('/pesan',[PesanController::class, 'store'])->name('pesan.store');
    Route::get('/riwayat',[HistoryController::class, 'index'])->name('riwayat');
    Route::get('/bayar/{id}',[HistoryController::class, 'bayar'])->name('bayar');
    Route::post('/pesan/{id}/upload-bukti', [PesanController::class, 'uploadBuktiPembayaran'])->name('pesan.uploadBukti');

});
require __DIR__.'/auth.php';
