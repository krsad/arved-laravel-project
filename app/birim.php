<?php

namespace Arved;

use Illuminate\Database\Eloquent\Model;

class birim extends Model
{
    //Tüm tablolara erişim verdiğini gösteriyor.
    protected $table = 'birims';
    protected $guarded = [];
}
