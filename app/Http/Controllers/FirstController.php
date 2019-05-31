<?php

namespace Arved\Http\Controllers;

use Arved\MakaleModal;
use Arved\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Arved\FirstModal;
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
        return redirect('/')->with('success','Personel Bilgileri Kaydedildi');
        //return response()->json($first);


    }

    
    public function show($id){
        $game = FirstModal::whereId($id)->get();

        return response()->json($game);
    }

    public function edit($ogretim_elemani)
    {
        $first = MakaleModal::find($ogretim_elemani);
        $users = UserModel::all();
        return view('edit', compact('first', 'ogretim_elemani', 'users') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Arved\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ogretim_elemani)
    {
        $this->validate($request,[

        ]);

        $first = FirstModal::find($ogretim_elemani);
        $first->ogretim_elemani = $request->get('ogretim_elemani');
        $first->wos_h_index = $request->get('wos_h_index');
        $first->wos_atif_sayisi = $request->get('wos_atif_sayisi');
        $first->scopus_h_index = $request->get('scopus_h_index');
        $first->scopus_atif_sayisi = $request->get('scopus_atif_sayisi');
        $first->uzmanlik_alani = $request->get('uzmanlik_alani');

        $first->save();
        return redirect('/')->with('success123','Veriler Güncellendi');

    }


    public function destroy($id)
    {
        $game = FirstModal::find($id);
        $game->delete();
        return redirect('/')->with('success','Veriler Silindi');
    }


}
