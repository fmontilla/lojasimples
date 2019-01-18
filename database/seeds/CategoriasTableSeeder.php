<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('nome' => 'Cama, mesa e banho'),
            array('nome' => 'Decoração'),
            array('nome' => 'Eletro'),
            array('nome' => 'Infantil'),
            array('nome' => 'Iluminação'),
        );

        \App\Models\Categoria::insert($data);
    }
}
