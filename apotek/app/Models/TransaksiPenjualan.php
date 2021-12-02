<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    protected $guarded = [];
    protected $table = 'transaksi_penjualan';

    public function produk()
    {
        return $this->hasOne(Obat::class, 'id', 'id');
    }
}
