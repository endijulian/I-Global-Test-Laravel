<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'departements';
    protected $fillable = ['nama_department', 'lantai'];

    public function karyawans()
    {
        return $this->hasMany('App\Karyawan');
    }
}
