<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

         Genero::create(['genero' => 'Masculino']);
         Genero::create(['genero' => 'Feminino']);
    }
}
