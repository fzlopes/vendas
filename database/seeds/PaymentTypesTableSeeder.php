<?php

use Illuminate\Database\Seeder;
use App\PaymentType;

class PaymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::truncate();

        PaymentType::create([
            'name' => 'A receber'
        ]);

        PaymentType::create([
            'name' => 'Cartão'
        ]);

        PaymentType::create([
            'name' => 'Dinheiro'
        ]);

        $this->command->info('The basic payment types was created.');

    }
}
