<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class, function (Faker\Generator $faker){
            return [
                'name'  => $faker->name,
                'price' => $faker->creditCardNumber,
                'qtd'   => $faker->bankAccountNumber
            ];
        });

//        factory(\App\Product::class, 20)->create([
//            'name'  => 'Cerveja',
//            'price' => '20',
//            'qtd'   => '20'
//        ]);
    }
}
