<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_1', function (Blueprint $table) {
            $table->id();
            $table->text('description');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('table_1');
    }
};
