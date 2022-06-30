<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableFaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('faturas', function (Blueprint $table) {
            $table->float('valor_mensal', 8,2)->after('pagamento_para');
            $table->integer('quant_meses')->after('valor_mensal');
            $table->float('total', 8,2)->after('quant_meses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('faturas', function (Blueprint $table) {
            $table->dropColumn(['valor_mensal', 'quant_meses', 'total' ]);
        });
    }
}
