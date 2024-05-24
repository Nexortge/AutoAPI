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
        schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('merk');
            $table->unsignedBigInteger('brandstof_id');

            $table->foreign('brandstof_id')->references('id')->on('kenmerken')->onDelete('cascade');

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
