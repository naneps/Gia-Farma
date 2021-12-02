<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            'nama_cv' => 'Apotek Bahagia',
            'alamat' => 'Sliyeg',
            'telepon' => '08078743',
            'logo' => 'img/logo/logo.png'
        ]);
    }
}
