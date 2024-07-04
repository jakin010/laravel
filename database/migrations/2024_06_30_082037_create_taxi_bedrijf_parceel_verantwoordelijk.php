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
        Schema::create('taxibedrijf_parceel_verantwoordelijk', function (Blueprint $table) {
            $table->id();

            $table->integer("taxibedrijf_id")->unsigned();
            $table->foreign('taxibedrijf_id')
                ->references('id')
                ->on('taxibedrijf')
                ->onDelete('cascade');

            $table->integer('parceel_id')->unsigned()->unique();
            $table->foreign('parceel_id')
                ->references('id')
                ->on('parcelen')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxi_bedrijf_parceel_verantwoordelijk');
    }
};
