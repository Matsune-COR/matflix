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
        $movies = Movie::with(['category', 'series'])
            ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'released_at')
            ->find($id);
        return view('user.show', compact('movies'));
    }

    public function evaluation($id)
    {
        $movies = Movie::with(['category', 'series'])
            ->select('id', 'name', 'information', 'category_id', 'series_id', 'view', 'released_at')
            ->find($id);
        return view('user.evaluation', compact('movies'));
    }

    public function evaluationPost()
    {
        return view('user.evaluation');
    }
}
