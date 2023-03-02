<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    //berikan nama table
    public $table = 'teachers';
    // ijinkan agar semua kolom dapat di isi dan simpan
    protected $guarded = [];
}