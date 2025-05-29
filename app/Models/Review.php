<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id'); // 外部キー名を指定
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 外部キー名を指定
    }

    use HasFactory;
}
