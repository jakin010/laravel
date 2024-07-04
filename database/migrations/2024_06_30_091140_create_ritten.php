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
        Schema::create('ritten', function (Blueprint $table) {
            $table->id();
            $table->integer("bewoner_id")->unsigned();
            $table->foreign("bewoner_id")
                ->references("id")
                ->on("bewoners")
                ->onDelete("cascade");
            $table->dateTime("date_of_rit");
            $table->integer("kilometer")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ritten');
    }
};
