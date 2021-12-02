<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'kategori';
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
}
