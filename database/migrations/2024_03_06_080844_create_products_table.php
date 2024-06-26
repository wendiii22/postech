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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('qty');
            $table->integer('selling_price');
            $table->integer('buying_price');
            $table->bigInteger('product_type_id')->unsigned()->nullable();
            $table->enum('product_status', ['available','unvailable'])->default('available');
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_types');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
