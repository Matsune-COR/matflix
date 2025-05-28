<?php

namespace Database\Seeders;

use Database\Factories\MatflixFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Matflix;

class MatflixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ムービーテーブル
        DB::table('movies')->insert([[
            'name' => 'ぐりぐりぐらぐら THE MOVIE',
            'information' => 'みんなでつくろう！ 絆のパンケーキ！',
            'category_id' => 1,//アニメーション
            'series_id' => 2,//ぐりぐりぐらぐらシリーズ
            'view' => 100000000,
            'released_at' => '2024-03-24',
            'is_distribution' => true,
        ],[
            'name' => 'ぐりぐりぐらぐら THE FINAL',
            'information' => 'ありったけの夢をかきあつめろ！',
            'category_id' => 1,//アニメーション
            'series_id' => 2,//ぐりぐりぐらぐらシリーズ
            'view' => 50000000,
            'released_at' => '2025-03-21',
            'is_distribution' => true,
        ],[
            'name' => 'ダイパニック',
            'information' => '笑いあり、涙あり、全米が鼻でわらった',
            'category_id' => 2,//コメディ
            'series_id' => 1,//シリーズなし
            'view' => 220000000,
            'released_at' => '1997-12-20',
            'is_distribution' => true,
        ],[
            'name' => '009(ダブルオーナイン) サーターアンダギー作戦',
            'information' => '達成不可能なミッション？なんくるないさ～',
            'category_id' => 3,//アクション
            'series_id' => 3,//009シリーズ
            'view' => 2000,
            'released_at' => '2022-04-11',
            'is_distribution' => true,
        ]]);

        //カテゴリテーブル
        DB::table('categories')->insert([[
            'name' => 'アニメーション',
            'rating' => 100,
        ],[
            'name' => 'コメディ',
            'rating' => 50,
        ],[
            'name' => 'アクション',
            'rating' => 70,
        ]]);

        //シリーズテーブル
        DB::table('series')->insert([[
            'name' => 'シリーズなし',
            'rating' => 0,
        ],[
            'name' => 'ぐりぐりぐらぐらシリーズ',
            'rating' => 100,
        ],[
            'name' => '009シリーズ',
            'rating' => 5,
        ]]);

        //ファクトリー
        Matflix::factory()->count(10)->create();
    }
}
