<?php

namespace App\Http\Controllers;

use App\birim;
use App\FirstModal;
use App\MakaleModal;
use Illuminate\Http\Request;

class BirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birim = birim::all();

        return view('birim.index', compact('birim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('birim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $birim = new birim();
        $birim->ogretim_elemani = $request->input('ogretim_elemani');
        $birim->tezli_yuksek_lisans = $request->input('tezli_yuksek_lisans');
        $birim->doktora_ogrenci = $request->input('doktora_ogrenci');
        $birim->doktor_mezun = $request->input('doktor_mezun');
        $birim->faal_olan_ogretim_uysei_teknoloji_sirket_sayisi = $request->input('faal_olan_ogretim_uysei_teknoloji_sirket_sayisi');
        $birim->doktora_burs_programi_alan_sayisi = $request->input('doktora_burs_programi_alan_sayisi');
        $birim->doktora_burs_programi_ogrenci_sayisi = $request->input('doktora_burs_programi_ogrenci_sayisi');
        $birim->ulusal_patent_belge_sayisi = $request->input('ulusal_patent_belge_sayisi');
        $birim->uluslararasi_patent_belge_sayisi = $request->input('uluslararasi_patent_belge_sayisi');
        $birim->faydali_model_ve_endustriyel_tasarim_sayisi = $request->input('faydali_model_ve_endustriyel_tasarim_sayisi');
        $birim->odullu_ogrenci_sayisi = $request->input('odullu_ogrenci_sayisi');


        $birim->save();
        return redirect('/')->with('success123','Birim Bilgileri Kaydedildi');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $birim = birim::whereId($id)->get();

        return response()->json($birim);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function edit(birim $birim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, birim $birim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function destroy(birim $birim)
    {
        //
    }
}
