<?php

namespace Arved\Http\Controllers;

use Arved\MakaleModal;
use Arved\Proje;
use Arved\UserModel;
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
    }
    public function edit($id)
    {
        $users=UserModel::all();

        $proje = Proje::find($id);
        return view('editProje', compact('proje', 'id','users') );

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

        $proje = Proje::find($id);
        $proje->ogretim_elemani = $request->get('ogretim_elemani');
        $proje->kurum_ici_proje = $request->get('kurum_ici_proje');
        $proje->uluslararasi_proje = $request->get('uluslararasi_proje');
        $proje->proje_durumu = $request->get('proje_durumu');
        $proje->proje_turu = $request->get('proje_turu');
        $proje->alan_bilgisi = $request->get('alan_bilgisi');
        $proje->proje_adi = $request->get('proje_adi');
        $proje->proje_butcesi = $request->get('proje_butcesi');
        $proje->para_birimi = $request->get('para_birimi');
        $proje->kontratli_proje = $request->get('kontratli_proje');
        $proje->dis_destekli_proje= $request->get('dis_destekli_proje');
        $proje->uluslararasi_isbirlikli_proje= $request->get('uluslararasi_isbirlikli_proje');
        $proje->arastirmaci_sayisi= $request->get('arastirmaci_sayisi');
        $proje->proje_yurutucusu= $request->get('proje_yurutucusu');

        $proje->save();
        return redirect('/')->with('success','Veriler Güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Arved\birim  $birim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proje = Proje::find($id);
        $proje->delete();
        return redirect('/')->with('success','Veriler Silindi');
    }

}
