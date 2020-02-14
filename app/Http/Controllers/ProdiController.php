<?php

namespace App\Http\Controllers;

use App\Prodi;
use App\Tim;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();

        return view('prodis.index', compact('prodis'));
    }

    public function create()
    {
        $prodis = Prodi::all();

        return view('prodis.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|unique:prodi',         
        ]); 

        Prodi::create($request->all());

        return redirect()->route('prodi.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $prodi = Prodi::findOrFail($id);

        return view('prodis.show', compact('prodi'));
    }

    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);

        return view('prodis.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|unique:prodi,nama,'.$id,      
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update($request->all());

        return redirect()->route('prodi.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                
        $tim = Tim::where('prodi_id', '=', $id)->first();
        $pesan = 'Gagal Karena Data Masih Digunakan Pada Tabel Lain';

        if(!$tim){            
            $prodi = Prodi::findOrFail($id);
            $prodi->delete();
            $pesan = 'Hapus Data Berhasil';
        }                

        return redirect()->route('prodi.index')->withMessage($pesan);
    }
}
