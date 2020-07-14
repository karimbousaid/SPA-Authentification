<?php

use App\User;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbProducts = (int)$this->command->ask("How many of Product you want to generate ?", 10);
        Factory(\App\Product::class,$nbProducts)->create();
    }
}
