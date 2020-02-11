<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use App\Models\MemberTim;
use Illuminate\Http\Request;

class PeranController extends Controller
{
    public function index()
    {
        $perans = Peran::all();

        return view('perans.index', compact('perans'));
    }

    public function create()
    {
        $perans = Peran::all();

        return view('perans.create', compact('perans'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|unique:peran,nama,'.$id,         
        ]); 

        Peran::create($request->all());

        return redirect()->route('peran.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $peran = Peran::findOrFail($id);

        return view('perans.show', compact('peran'));
    }

    public function edit($id)
    {
        $peran = Peran::findOrFail($id);

        return view('perans.edit', compact('peran'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|unique:peran,nama,'.$id, 
        ]);

        $peran = Peran::findOrFail($id);
        $peran->update($request->all());

        return redirect()->route('peran.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                
        $member_tim = MemberTim::where('peran_id', '=', $id)->first();
        $pesan = 'Gagal Karena Data Masih Digunakan Pada Tabel Lain';

        if(!$member_tim){            
            $peran = Peran::findOrFail($id);
            $peran->delete();
            $pesan = 'Hapus Data Berhasil';
        }                

        return redirect()->route('peran.index')->withMessage($pesan);
    }
}
