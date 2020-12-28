<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;
use Illuminate\Support\Facades\Validator;

class ControllerProyek extends Controller
{
    public function index(Request $request)
    {
        $proyek = Proyek::paginate(2);

        $cari = $request->get('keyword');

        if ($cari) {
            $proyek = Proyek::where('nama_proyek', 'LIKE', "%$cari%")->paginate(1);
        }

        return view('proyek.index', compact('proyek'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $input_proyek = $request->all();

        // dd($input_proyek);

        $validasi = Validator::make($input_proyek, [
            'nama_proyek' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('proyek.create')->withErrors($validasi)->withInput();
        }

        Proyek::create($input_proyek);
        return redirect()->route('proyek.index')->with('status', 'Berhasil di Tambah');
    }

    public function edit($id)
    {
        $editProyek = Proyek::findOrFail($id);
        return view('proyek.edit', compact('editProyek'));
    }

    public function update(Request $request, $id)
    {
        $update = Proyek::findOrFail($id);
        $update_proyek = $request->all();
        // dd($update_proyek);

        $validasi = Validator::make($update_proyek, [
            'nama_proyek' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('proyek.edit', [$id])->withErrors($validasi)->withInput();
        }

        $update->update($update_proyek);
        return redirect()->route('proyek.index')->with('status', 'Berhasil di Update');
    }

    public function destroy($id)
    {
        $delete = Proyek::find($id);
        $delete->delete();

        return redirect()->route('proyek.index')->with('status', 'Berhasil di Hapus');
    }
}
