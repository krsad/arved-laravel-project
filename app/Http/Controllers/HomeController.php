<?php

namespace Arved\Http\Controllers;

use Arved\makale;
use Arved\MakaleModal;
use Arved\Product;
use Arved\birim;
use Arved\Proje;
use Arved\UserModel;
use Illuminate\Http\Request;
use Arved\FirstModal;

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
        //game artık home page de personel bilgileri objesi
        $game = FirstModal::query()->get();
        $makales = MakaleModal::query()->get();
        $users = UserModel::query()->get();
        $projes = Proje::query()->get();
        $birims = birim::query()->get();
        return view('home',compact('game','makales','users','projes','birims'));
    }


}
