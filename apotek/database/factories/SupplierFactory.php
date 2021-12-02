<?php

namespace Database\Factories;

use App\Models\Supplier;
use Faker\Provider\id_ID\Company;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_sup' => $this->faker->Company::VAT_TYPE_HEALTH_AUTHORITY,
            'telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address()
        ];
    }
}
