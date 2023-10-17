<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mapping_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_data_id');
            $table->text('description');
            $table->enum('reason', ['A','B','C'])->default('A');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('mapping_data');
    }
};
