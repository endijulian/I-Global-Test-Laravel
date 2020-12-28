<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;
use App\Karyawan;
use App\Proyek;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class ControllerKaryawan extends Controller
{
    public function index(Request $request)
    {
        // $karyawan = Karyawan::paginate(5);

        // $cari = $request->get('keyword');

        // if ($cari) {
        //     $karyawan = Karyawan::where('nama_karyawan', 'LIKE', "%$cari%")->paginate(5);
        // }

        if (request('keyword')) {
            $karyawan = Karyawan::whereHas('departemen', function (Builder $query) {
                $query->where('nama_karyawan', 'like', '%' . request('keyword') . '%')
                    ->orwhere('nama_department', 'like', '%' . request('keyword') . '%');
                // ->orwhere('username', 'like', '%' . request('keyword') . '%');
            })->paginate(1);
        } else {
            $karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->paginate(1);
        }

        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        $departement = Departement::all();
        $proyek = Proyek::all();
        return view('karyawan.create', compact('proyek', 'departement'));
    }

    public function store(Request $request)
    {
        $input_karyawan = $request->all();

        // dd($input_karyawan);

        $validasi = Validator::make($input_karyawan, [
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'departement_id' => 'required',
            'proyek_id' => 'required',
            'telpon' => 'required|unique:karyawans'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('karyawan.create')->withErrors($validasi)->withInput();
        }

        Karyawan::create($input_karyawan);
        return redirect()->route('karyawan.index')->with('status', 'Berhasil di Tambah');
    }

    public function edit($id)
    {
        $departement = Departement::all();
        $proyek = Proyek::all();
        $editKaryawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('editKaryawan', 'proyek', 'departement'));
    }

    public function update(Request $request, $id)
    {
        $update = Karyawan::findOrFail($id);
        $update_karyawan = $request->all();

        // dd($update_karyawan);

        $validasi = Validator::make($update_karyawan, [
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'departement_id' => 'required',
            'proyek_id' => 'required',
            'telpon' => 'required|unique:karyawans,telpon,' . $id,
        ]);

        if ($validasi->fails()) {
            return redirect()->route('karyawan.edit', [$id])->withErrors($validasi)->withInput();
        }

        $update->update($update_karyawan);
        return redirect()->route('karyawan.index')->with('status', 'Berhasil di Update');
    }

    public function destroy($id)
    {
        $delete = Karyawan::find($id);
        $delete->delete();

        return redirect()->route('karyawan.index')->with('status', 'Berhasil di Hapus');
    }
}
