<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = "guru";
    protected $fillable = ['id_sekolah', 'nama_guru', 'nik', 'password', 'picture'];
    protected $hidden = [];
}
