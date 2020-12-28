<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyeks';
    protected $fillable = ['nama_proyek', 'tanggal_mulai', 'tanggal_selesai'];

    public function karyawan()
    {
        return $this->hasMany('App\Karyawan');
    }
}
