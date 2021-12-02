
<?php

use App\Models\Obat;
use App\Models\Setting;
use App\Models\Kategori;
use App\Models\Supplier;
use app\Http\Controller\Controller;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PembelianController;
use App\Http\Controllers\Admin\PenjualanController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\TransaksiPenjualanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $dataObat = Obat::count();
    $dataKategori = Kategori::count();
    $dataSupplier = Supplier::count();

    return view('admin.dashboard', compact('dataObat', 'dataKategori', 'dataSupplier'));
});


Route::get('dataobat', [ObatController::class, 'getDataObat'])->name('obat.tabel');
Route::get('deskripsi', [ObatController::class, 'showDeskripsi'])->name('deskripsi.tabel');
Route::get('Datakategori', [KategoriController::class, 'getKategori'])->name('kategori.tabel');
Route::get('dataSupplier', [SupplierController::class, 'getSupplier'])->name('supplier.tabel');

Route::resource('dashboard', DashboardController::class);
Route::resource('obat', ObatController::class);
Route::resource('penjualan', PenjualanController::class);
Route::resource('pembelian', PembelianController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('pelanggan', CustomerController::class);
Route::resource('pesanan', PesananController::class);
Route::resource('transaksipenjualan', TransaksiPenjualanController::class);



// route pembeli
Route::get('customer/home', function () {
    return view('customer.home');
});


require __DIR__ . '/auth.php';
