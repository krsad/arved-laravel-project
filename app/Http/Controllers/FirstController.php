<?php

namespace App\Http\Controllers;

use App\MakaleModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\FirstModal;
class FirstController extends Controller
{
    //
    public function index()
    {
        $firsts = FirstModal::all();

        return view('firsts.index', compact('firsts'));
    }

    public function create()
    {
        return view('firsts.create');
    }
    public function store(Request $request){
        $first = new FirstModal();
        $first->ogretim_elemani = $request->input('ogretim_elemani');
        $first->wos_h_index = $request->input('wos_h_index');
        $first->wos_atif_sayisi = $request->input('wos_atif_sayisi');
        $first->scopus_h_index = $request->input('scopus_h_index');
        $first->scopus_atif_sayisi = $request->input('scopus_atif_sayisi');
        $first->uzmanlik_alani = $request->input('uzmanlik_alani');

        $first->save();
        return redirect('/')->with('success123','Personel Bilgileri Kaydedildi');
        //return response()->json($first);


    }

    
    public function show($id){
        $game = FirstModal::whereId($id)->get();

        return response()->json($game);
    }
    public function destroy($id)
    {
        $game = FirstModal::find($id);
        $game->delete();
        return redirect('/')->with('success','Veriler Silindi');
    }


}
