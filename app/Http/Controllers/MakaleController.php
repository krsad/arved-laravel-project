<?php

namespace Arved\Http\Controllers;

use Arved\birim;
use Arved\MakaleModal;
use Arved\UserModel;
use Illuminate\Http\Request;

class MakaleController extends Controller
{
    //
    public function index()
    {
        $makale = makaleModal::all();
        $users = UserModel::all();
        return view('makale.index', compact('makale','users'));
    }

    public function create()
    {
        return view('makale.create');
    }
    public function store(Request $request){
        $makale = new MakaleModal();
        $makale->ogretim_elemani = $request->input('ogretim_elemani');
        $makale->yayin_turu = $request->input('yayin_turu');
        $makale->endeks_turu = $request->input('endeks_turu');
        $makale->isim = $request->input('isim');
        $makale->yazarlar = $request->input('yazarlar');

        $makale->dergi_adi = $request->input('dergi_adi');
        $makale->konferans_adi = $request->input('konferans_adi');
        $makale->cilt = $request->input('cilt');
        $makale->numara = $request->input('numara');
        $makale->sayfa = $request->input('sayfa');
        $makale->yil = $request->input('yil');
        $makale->doi= $request->input('doi');
        $makale->proje_yurutucusu= $request->input('proje_yurutucusu');

        $makale->save();
        return   redirect('/')->with('success123','Makale Bilgileri Kaydedildi');




    }


    public function show($id){
        $game = MakaleModal::whereId($id)->get();

        return response()->json($game);
    }
    public function edit($id)
    {
        $makale = MakaleModal::find($id);
        $users = UserModel::all();
        return view('edit', compact('makale', 'id', 'users') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Arved\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

        ]);

        $makale = MakaleModal::find($id);
        $makale->ogretim_elemani = $request->get('ogretim_elemani');
        $makale->yayin_turu = $request->get('yayin_turu');
        $makale->endeks_turu = $request->get('endeks_turu');
        $makale->isim = $request->get('isim');

        $makale->yazarlar = $request->get('yazarlar');

        $makale->dergi_adi = $request->get('dergi_adi');
        $makale->konferans_adi = $request->get('konferans_adi');
        $makale->cilt = $request->get('cilt');
        $makale->numara = $request->get('numara');
        $makale->sayfa = $request->get('sayfa');
        $makale->yil = $request->get('yil');
        $makale->doi= $request->get('doi');
        $makale->proje_yurutucusu= $request->get('proje_yurutucusu');

        $makale->save();
        return redirect('/')->with('success123','Veriler Güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Arved\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makale = MakaleModal::find($id);
        $makale->delete();
        return redirect('/')->with('success123','Veriler Silindi');
    }

}

