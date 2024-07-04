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
        Schema::create('bewoners', function (Blueprint $table) {
            $table->id();
            $table->string("name");

            $table->boolean("wmo_vernieuw")->default(false);
            $table->integer("beschikking_id")->unsigned()->unique()->nullable();
            $table->foreign("beschikking_id")
                ->references("id")
                ->on("beschikkingen")
                ->onDelete("cascade");

            $table->integer('parceel_id')->unsigned()->unique();
            $table->foreign('parceel_id')
                ->references('id')
                ->on('parcelen');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bewoners');
    }
};
