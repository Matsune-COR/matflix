<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category; //モデルのインポート
use App\Models\Movie; //モデルのインポート
use App\Models\Review; //モデルのインポート
use App\Models\Series; //モデルのインポート
use App\Models\User; //モデルのインポート

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with(['category','series'])
        ->select('id','name','information','category_id','series_id','view','is_distribution','released_at')
        // ->where('is_distribution',1)
        ->get();
        return view('admin.index', compact('movies'));
    }

    public function create(Request $request)
    {
        return view('admin.create', compact('request'));
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            // nameを 必須、2文字以上、10文字以内 とする
            'name' => ['required', 'min:2'],
            'information' => ['required'],
            'is_distribution' => ['required'],
            'released_at' => ['required']
        ]);

        // 入力画面に戻る処理
        if ($request->has('back')){
            // withInput()は、リダイレクト時に、現在の入力内容を付ける命令
            return redirect('/admin/create')->withInput();
        }

        // (追加)確認画面で送信ボタンが押されたときの処理
        if ($request->has('send')) {
            $new_movie = new Movie();
            $new_movie->name = $request->name;
            $new_movie->information = $request->information;
            $new_movie->category_id = $request->category_id;
            $new_movie->series_id = $request->series_id;
            $new_movie->view = $request->view;
            $new_movie->is_distribution = $request->is_distribution;
            $new_movie->released_at = $request->released_at;
            $new_movie->save(); // DBに保存
            // 完了画面を表示
            return redirect('/admin/index');
        }
    }

    public function show(string $id)
    {
        // URLに含まれる、データのid番号を利用する
        $movie = Movie::with(['category','series'])
        ->select('id','name','information','category_id','series_id','view','is_distribution','released_at')
        ->where('id',$id)
        ->first();
        // 編集画面に、データを表示する
        return view('admin.show', compact('movie'));
    }

    public function edit(string $id)
    {
        // URLに含まれる、データのid番号を利用する
        $movie = Movie::with(['category','series'])
        ->select('id','name','information','category_id','series_id','view','is_distribution','released_at')
        ->where('id',$id)
        ->first();
        // 編集画面に、データを表示する
        return view('admin.edit', compact('movie'));
    }

    public function update(Request $request, string $id)
    {
        // バリデーション
        $request->validate([
            // nameを 必須、2文字以上、10文字以内 とする
            'name' => ['required', 'min:2'],
            'information' => ['required'],
            'is_distribution' => ['required'],
            'released_at' => ['required']
        ]);

        //モデルで編集対象のデータを取得し、nameの値を変更して上書き
        $movie = Movie::find($id);
        $movie->name = $request->name;
        $movie->information = $request->information;
        $movie->category_id = $request->category_id ;
        $movie->series_id = $request->series_id;
        $movie->view = $request->view;
        $movie->is_distribution = $request->is_distribution;
        $movie->released_at = $request->released_at;
        $movie->save(); // DBに保存

        return redirect('/admin/index');
    }
}
