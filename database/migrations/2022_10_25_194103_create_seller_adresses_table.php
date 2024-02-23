<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_adresses', function (Blueprint $table) {
            $table->id();
            $table->string('SupplierCity')->nullable();
            $table->string('SupplierCounty')->nullable();
            $table->string('SupplierRegion')->nullable();
            $table->string('SupplierType')->nullable();
            $table->string('SupplierId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_adresses');
    }
};
