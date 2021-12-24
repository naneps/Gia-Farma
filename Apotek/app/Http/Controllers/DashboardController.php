<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {


        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();
        $penjualan = Penjualan::count();
        $pembelian = Pembelian::count();
        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');
        $penjualan_hari = $this->getEarnDay();
        $penjualan_minggu = $this->getEarnWeek();
        $penjualan_bulan = $this->getEarnMonth();
        $produkKeluar = $this->showOutProduk();

        // dd($penjualan_bulan);
        // dd(Carbon::now()->startOfMonth());

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_penjualan = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        if (auth()->user()->level == 1) {
            return view('admin.dashboard', compact('kategori','penjualan_bulan','penjualan_minggu','penjualan_hari', 'produk', 'supplier', 'penjualan', 'pembelian', 'member', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan'));
        } else {
            return view('kasir.dashboard');
        }
    }
    public function getPendapatan() {
        $date = Carbon::now();

        $record = Penjualan::select(DB::raw("SUM(total_harga) as total"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->whereBetween('created_at',[$date->startOfWeek(),Carbon::today()->addDays(6)])
        // ->whereDste('created_at',[$date->startOfWeek(),$date->endOfWeek()])
        ->groupBy('day_name','day')
        ->orderBy('day')->get();

        return $record;
    }
    public function getEarnDay(){
        $date = Carbon::now();

        $record = Penjualan::whereDate('created_at', $date->today())->sum('total_harga');
        return $record;

    }

    public function getEarnWeek(){
        $date = Carbon::now();
        $record = Penjualan::whereBetween('created_at',[$date->startOfWeek(),Carbon::today()->addDays(6)])->sum('total_harga');
        return $record;
    }
    public function getEarnMonth(){
        $date = Carbon::today();
        $record = Penjualan::whereMonth('created_at',$date)->sum('total_harga');
        return $record;
    }

    public function showOutProduk(){
        $date = Carbon::now();
        $products = PenjualanDetail::whereDate('created_at', $date->today())->with('produk')->limit(6)->latest()->get();
       return $products;

    }

}

