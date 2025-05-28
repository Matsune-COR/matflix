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
        return view('admin.movies');
    }
}
