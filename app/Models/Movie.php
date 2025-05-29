<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // 外部キー名を指定
    }

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id'); // 外部キー名を指定
    }
}
