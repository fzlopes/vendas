<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        Product::create([
            'name' => 'Sabão de roupa',
            'value' => 12.00
        ]);

        Product::create([
            'name' => 'Desengordurante',
            'value' => 12.00
        ]);

        Product::create([
            'name' => 'Amaciante de roupa',
            'value' => 5.50
        ]);

        Product::create([
            'name' => 'Detergente de louça',
            'value' => 5.00
        ]);

        Product::create([
            'name' => 'Desinfetante Fresh',
            'value' => 4.50
        ]);

        Product::create([
            'name' => 'Desinfetante Citronela',
            'value' => 4.50
        ]);

        Product::create([
            'name' => 'Desinfetante Eucalipto',
            'value' => 4.50
        ]);

        Product::create([
            'name' => 'Desinfetante Floral',
            'value' => 4.50
        ]);

        Product::create([
            'name' => 'Desinfetante Limão',
            'value' => 4.50
        ]);

        Product::create([
            'name' => 'Agua Sanitária',
            'value' => 3.50
        ]);

        $this->command->info('The basic products was created.');
    }
    
}
