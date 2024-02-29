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
        Schema::create('mains', function (Blueprint $table) {
            $table->id();
            $table->string('icon_img');
            $table->string('ic_title');
            $table->string('ic_sub_title');
            $table->string('title');
            $table->string('sub_title');
            $table->string('bc_img');
            $table->string('bc_imga');
            $table->string('bc_imgb');
            $table->timestamps();

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
