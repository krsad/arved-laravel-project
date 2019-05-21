<?php

namespace App\Http\Controllers;

use App\Proje;
use Illuminate\Http\Request;

class ProjeController extends Controller
{
    public function index()
    {
        $projes = Proje::all();

        return view('projes.index', compact('projes'));
    }

    public function create()
    {
        return view('proje.create');
    }
    public function store(Request $request){
        $projes= new Proje();
        $projes->ogretim_elemani = $request->input('ogretim_elemani');
        $projes->kurum_ici_proje = $request->input('kurum_ici_proje');
        $projes->uluslararasi_proje = $request->input('uluslararasi_proje');
        $projes->proje_durumu = $request->input('proje_durumu');
        $projes->proje_turu = $request->input('proje_turu');
        $projes->alan_bilgisi = $request->input('alan_bilgisi');
        $projes->proje_adi = $request->input('proje_adi');
        $projes->proje_butcesi = $request->input('proje_butcesi');
        $projes->para_birimi = $request->input('para_birimi');
        $projes->kontratli_proje = $request->input('kontratli_proje');
        $projes->dis_destekli_proje = $request->input('dis_destekli_proje');
        $projes->uluslararasi_isbirlikli_proje= $request->input('uluslararasi_isbirlikli_proje');
        $projes->arastirmaci_sayisi= $request->input('arastirmaci_sayisi');
        $projes->proje_yurutucusu = $request->input('proje_yurutucusu');

        $projes->save();
        return redirect('/')->with('success123','Proje Bilgileri Kaydedildi');


    }


    public function show($id){
        $proje1= Proje::whereId($id)->get();

        return response()->json(proje1);
    }}
