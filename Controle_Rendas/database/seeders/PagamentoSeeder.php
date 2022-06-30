<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pagamento;

class PagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pagamento::create(['pagamento_para' => 'Renda']);
        Pagamento::create(['pagamento_para' => 'Venda']);
    }
}
