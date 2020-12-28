<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawans';
    protected $fillable = ['nama_karyawan', 'alamat', 'jenis_kelamin', 'departement_id', 'proyek_id', 'telpon'];

    public function departemen()
    {
        return $this->belongsTo('App\Departement', 'departement_id');
    }

    public function proyek()
    {
        return $this->belongsTo('App\Proyek', 'proyek_id');
    }
}
