<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;
use Illuminate\Support\Facades\Validator;

class ControllerDepartement extends Controller
{
    public function index(Request $request)
    {

        $depart = Departement::paginate(1);

        $cari = $request->get('keyword');

        if ($cari) {
            $depart = Departement::where('nama_department', 'LIKE', "%$cari%")->paginate(1);
        }

        return view('depart.index', compact('depart'));
    }

    public function create()
    {
        return view('depart.create');
    }

    public function store(Request $request)
    {
        $input_departement = $request->all();

        // dd($input_departement);

        $validasi = Validator::make($input_departement, [
            'nama_department' => 'required',
            'lantai' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('departement.create')->withErrors($validasi)->withInput();
        }

        Departement::create($input_departement);
        return redirect()->route('departement.index')->with('status', 'Berhasil di Tambah');
    }

    public function edit($id)
    {
        $editDepart = Departement::findOrFail($id);
        return view('depart.edit', compact('editDepart'));
    }

    public function update(Request $request, $id)
    {
        $update = Departement::findOrFail($id);
        $update_depart = $request->all();

        $validasi = Validator::make($update_depart, [
            'nama_department' => 'required',
            'lantai' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('departement.edit', [$id])->withErrors($validasi)->withInput();
        }

        $update->update($update_depart);
        return redirect()->route('departement.index')->with('status', 'Berhasil di Update');
    }

    public function destroy($id)
    {
        $delete = Departement::find($id);
        $delete->delete();

        return redirect()->route('departement.index')->with('status', 'Berhasil di Hapus');
    }
}
