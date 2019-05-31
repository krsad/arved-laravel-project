<?php

namespace Arved\Http\Controllers\auth;

use Hash;
use Auth;
use Illuminate\Http\Request;
use Arved\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        // Giriş yapmadan sayfayalara ulaşılmasını engelleyelim.
        $this->middleware('auth');
    }

    public function showChangeForm()
    {
        // Şifre değişikliği yapacağımız forma yönlendirelim.
        return view('auth.passwords.changeForm');
    }

    public function changePassword(Request $request)
    {
        // Mevcut şifre veritabanındaki şifre ile eşleşmiyorsa hata döndürelim.
        if(! Hash::check($request->current_password, Auth::user()->password))
        {
            return redirect()->back()->withErrors(["current_password" => "Mevcut şifrenizi hatalı yazdınız."]);
        }

        // Mevcut şifre ile yeni şifre aynı ise hata döndürelim.
        if(strcmp($request->current_password, $request->password) == 0)
        {
            return redirect()->back()->withErrors(["password" => "Yeni şifre, mevcut şifrenizle aynı olamaz. Lütfen farklı bir şifre seçin."]);
        }

        // Şifre alanının gerekliliklerini belirleyelim.
        $request->validate( [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = Auth::user();
        // Yeni şifreyi Hash::make ile şifreleyelim.
        $user->password = Hash::make($request->password);
        // Bilgileri veritabanına kaydedelim.
        $user->save();

        // Bilgiler kaydedildikten sonra forma geri dönüp başarılı mesajını gösterelim.
        return redirect()->back()->with("success","Şifreniz başarıyla değiştirildi.");

    }
}
