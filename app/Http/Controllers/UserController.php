<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Souvenir; //モデルのインポート

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $souvenirs = Souvenir::select('id', 'name', 'prefecture', 'price', 'stock', 'description', 'user_id', 'is_visible')
        // ->where('is_visible', true)
        // ->where('user_id', Auth::id())
        // ->get();
        //
        return view('user.register', compact('souvenirs'));
    }
}
