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
        Schema::create('kenmerken', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Auto_id');
            $table->string('Brandstof_type');
            $table->date('Eerste_bouwjaar');


            $table->foreign('Auto_id')->references('id')->on('autos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
