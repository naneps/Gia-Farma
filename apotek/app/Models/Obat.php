<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'obat';
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
