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
        if (!Schema::hasTable('news')) {
            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('showview');
                $table->text('des');
                $table->string('short_des');
                $table->string('images');
                $table->string('title_go');
                $table->string('keyword_go');
                $table->string('des_go');
                $table->string('slug');
                $table->string('views');
                $table->string('hot');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
