<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Produto::class,function (Faker\Generator $faker) {
    $categorias = \App\Models\Categoria::all();

    return [
        'nome' => $faker->text(15),
        'descricao' => $faker->text,
        'imagem_principal' => $faker->imageUrl($width = 600, $height = 400),
        'imagens' => [["imagem" => $faker->imageUrl($width = 600, $height = 400)],["imagem" => $faker->imageUrl($width = 600, $height = 400)],["imagem" => $faker->imageUrl($width = 600, $height = 400)],["imagem" => $faker->imageUrl($width = 600, $height = 400)]],
        'preco' => $faker->randomFloat(2,30,1000),
        'categoria_id' => $categorias->random(),
        'caracteristicas' => ["cor" => $faker->colorName,"instrucoes_cuidados" => $faker->text,"modelo" => $faker->firstName,"material" => $faker->firstName]
    ];
});
