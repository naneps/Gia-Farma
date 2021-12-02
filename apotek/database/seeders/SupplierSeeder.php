<?php

namespace Database\Seeders;

use Carbon\Factory;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Database\Factories\SupplierFactory;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Supplier::class, 10)->create();
        Supplier::factory(15)->create();
    }
}
