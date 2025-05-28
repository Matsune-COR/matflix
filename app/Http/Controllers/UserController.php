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
        return view('user.index', compact('request'));
    }
}
