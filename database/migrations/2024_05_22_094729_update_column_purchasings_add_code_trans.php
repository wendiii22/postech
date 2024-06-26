<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('purchasings', function (Blueprint $table) {
            $table->string('code_trans');
            // $table->renameColumn('date_sell', 'tgl_sell');
            // $table->dropColumn('date_sell');
            // $table->string('grand_total')->nullable()->change();

            // $table->dropForeign('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchasings', function (Blueprint $table) {
            //
        });
    }
};
