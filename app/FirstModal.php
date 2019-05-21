<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirstModal extends Model
{
    //
    protected $guarded = ['id'];
    
protected $table = 'first';
protected $fillable = ['ogretim_elemani','wos_h_index','wos_atif_sayisi','scopus_h_index','scopus_atif_sayisi','uzmanlik_alani'];

}
