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
    public function index()
    {
        $movies = Movie::with(['category', 'series'])
            ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'released_at', "is_distribution")
            ->where('is_distribution', true)
            ->get();
        return view('user.index', compact('movies'));
    }

    public function view()
    {
        return view('user.view');
    }

    public function show($id)
    {
        $movie = Movie::with(['category', 'series'])
            ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'released_at')
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
