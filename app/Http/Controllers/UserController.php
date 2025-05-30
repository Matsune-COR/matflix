<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Series;
use App\Models\User; //モデルのインポート

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = $request->has('sort'); //sortの値があればtrue,無ければfalse
        // キーワードを取得
        $keywords = $request->input('keywords'); // "映画 ドラマ"のような複数キーワードを想定

        if ($result)
        {
            //ソート機能実装箇所
            if($request->sort == 1)
            {
                //視聴回数順
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->orderBy('view', 'desc') // 視聴回数の降順で並び替え
                ->get();
            }
            else if($request->sort == 2)
            {
                //公開日（昇順）
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->orderBy('released_at', 'asc') // 公開日の昇順で並び替え
                ->get();
            }
            else if($request->sort == 3)
            {
                //公開日（降順）
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->orderBy('released_at', 'desc') // 公開日の降順で並び替え
                ->get();
            }
            else if($request->sort == 4)
            {
                //アニメーションカテゴリ
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->where('category_id',1)
                ->get();
            }
            else if($request->sort == 5)
            {
                //コメディカテゴリ
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->where('category_id',2)
                ->get();
            }
            else if($request->sort == 6)
            {
                //アクションカテゴリ
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->where('category_id',3)
                ->get();
            }
            else if($request->sort == 7)
            {
                //ホラーカテゴリ
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->where('category_id',4)
                ->get();
            }
        }
        else
        {
            if (is_null($keywords))
            {
                // $keywordsがnullの場合の処理
                $movies = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at')
                ->get();
            }
            else
            {
                // キーワードが存在する場合の処理
                $keywordArray = explode(' ', $keywords);

                $query = Movie::with(['category', 'series'])
                ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'is_distribution', 'released_at');

                foreach ($keywordArray as $keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                }
                $movies = $query->get();
            }
        }
        return view('user.index', compact('movies'));
    }

    public function view()
    {
        return view('user.view');
    }

    public function show($id)
    {
        $movie = Movie::with(['category', 'series'])
            ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'released_at','image_path')
            ->find($id);
        return view('user.show', compact('movie'));
    }

    public function evaluation($id)
    {
        $movie = Movie::with(['category', 'series'])
            ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'released_at')
            ->find($id);
        return view('user.evaluation', compact('movie'));
    }

    public function evaluationPost(Request $request, string $id)
    {
        // バリデーション
        $request->validate([
            // nameを 必須、2文字以上、10文字以内 とする
            'review' => ['required']
        ]);

        //モデルで編集対象のデータを取得し、nameの値を変更して上書き
        $new_review = new Review();
        $new_review->movie_id = $id;
        $new_review->user_id = Auth::user()->id;
        $new_review->review = $request->review;
        $new_review->rating = $request->rating;
        $new_review->save(); // DBに保存

        return redirect('/user/index');
    }

    public function reviews($id)
    {
        $reviews = Review::with(['movie', 'user'])
            ->select('id', 'movie_id', 'user_id', 'review', 'rating')
            ->where('movie_id',$id)
            ->get();
        return view('user.reviews', compact('reviews'));
    }
}
