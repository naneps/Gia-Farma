<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kategori';
    public function obat()
    {
        return $this->hasOne(Obat::class, 'kategori_id');
    }
}
