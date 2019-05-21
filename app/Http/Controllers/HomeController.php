<?php

namespace App\Http\Controllers;

use App\makale;
use App\MakaleModal;
use App\Product;
use App\UserModel;
use Illuminate\Http\Request;
use App\FirstModal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $game = FirstModal::query()->get();
        $makales = MakaleModal::query()->get();
        $users = UserModel::query()->get();
        return view('home',compact('game','makales','users'));
    }


}
