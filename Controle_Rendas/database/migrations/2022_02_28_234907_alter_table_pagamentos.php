<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePagamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pagamentos', function (Blueprint $table) {
            $table->string('pagamento_para', 30);
            $table->dropColumn('paramento_para');
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
        Schema::table('pagamentos', function (Blueprint $table) {
            $table->string('paramento_para', 30);
            $table->dropColumn('pagamento_para');
        });
    }
}
