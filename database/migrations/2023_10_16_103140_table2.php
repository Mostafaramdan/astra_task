<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_1_id');
            $table->text('description');
            $table->enum('reason', ['A','B','C'])->default('A');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('table_2');
    }
};
