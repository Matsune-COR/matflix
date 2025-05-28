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
        //口コミテーブル
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id');//外部キー
            $table->foreignId('user_id');//外部キー
            $table->string('review');
            $table->double('rating');
            $table->timestamps(); // created_at と updated_at を追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
