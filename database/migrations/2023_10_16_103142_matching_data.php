<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matching_data', function (Blueprint $table) {
            $table->id();
            $table->text('x');
            $table->text('y');
            $table->text('z');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('matching_data');
    }
};
