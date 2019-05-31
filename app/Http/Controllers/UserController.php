<?php

namespace Arved\Http\Controllers;

use Arved\FirstModal;
use Arved\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserModel::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[

        ]);

        $first = UserModel::find($id);
        $first->wos_h_index = $request->get('wos_h_index');
        $first->wos_atif_sayisi = $request->get('wos_atif_sayisi');
        $first->scopus_h_index = $request->get('scopus_h_index');
        $first->scopus_atif_sayisi = $request->get('scopus_atif_sayisi');
        $first->uzmanlik_alani = $request->get('uzmanlik_alani');

        $first->save();
        return redirect('/')->with('success123','Veriler Güncellendi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = UserModel::whereId($id)->get();

        return response()->json($game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=UserModel::all();

        return view('editProje', compact('proje', 'id','users') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $first = new UserModel();

        $first->wos_h_index = $request->input('wos_h_index');
        $first->wos_atif_sayisi = $request->input('wos_atif_sayisi');
        $first->scopus_h_index = $request->input('scopus_h_index');
        $first->scopus_atif_sayisi = $request->input('scopus_atif_sayisi');
        $first->uzmanlik_alani = $request->input('uzmanlik_alani');

        $first->save();
        return redirect('/')->with('success','Personel Bilgileri Kaydedildi');
        //return response()->json($first);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $makale = UserModel::find($id);
        $makale->delete();
        return redirect('/')->with('success','Veriler Silindi');
    }
}
