<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subjects_id extends Model
{
    //berikan nama table
    public $table = 'subjects';
    // ijinkan agar semua kolom dapat di isi dan simpan
    protected $guarded = [];
}