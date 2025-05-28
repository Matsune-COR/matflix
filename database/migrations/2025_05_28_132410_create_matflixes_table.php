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
        //カテゴリテーブル
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rating');
        });

        //シリーズテーブル
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rating');
        });

        //ムービーテーブル
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('information');
            $table->foreignId('category_id');//外部キー
            $table->foreignId('series_id');//外部キー
            $table->bigInteger('view');
            $table->boolean('is_distribution')->default(0);
            $table->date('released_at');
            $table->timestamps();
        });

        //口コミテーブル
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id');//外部キー
            $table->foreignId('user_id');//外部キー
            $table->string('review');
            $table->double('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('series');
        Schema::dropIfExists('movie');
    }
};
