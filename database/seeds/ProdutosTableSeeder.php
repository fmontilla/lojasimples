<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Produto::class, 10)
            ->create()->each(function($produto){
                $produto->save();
            });
    }
}
