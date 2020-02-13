<?php

namespace App\Http\Controllers;

use App\Models\Membertim;
use App\Models\Membertimskor;
use App\Models\User;
use App\Models\Tim;
use App\Models\Peran;
use Illuminate\Http\Request;

class MembertimController extends Controller
{
    public function index()
    {
        $membertims = Membertim::all();

        return view('membertims.index', compact('membertims'));
    }

    public function create()
    {
        $membertims = Membertim::all();
        $tims = Tim::all();
        $mahasiswas = User::where('role', 'Mahasiswa')->get();
        $perans = Peran::all();

        return view('membertims.create', compact('membertims', 'tims', 'mahasiswas', 'perans'));
    }

    public function store(Request $request)
    {
        $request['created_by_id'] = 2;

        $this->validate($request,[
            'tim_id' => 'required',
            'mahasiswa_id' => 'required',
            'peran_id' => 'required',
            'tanggung_jawab' => 'required',         
        ]); 

        Membertim::create($request->all());

        return redirect()->route('membertim.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $membertim = Membertim::findOrFail($id);

        return view('membertims.show', compact('membertim'));
    }

    public function edit($id)
    {
        $membertim = Membertim::findOrFail($id);
        $tims = Tim::all();
        $mahasiswas = User::where('role', 'Mahasiswa')->get();
        $perans = Peran::all();

        return view('membertims.edit', compact('membertim', 'tims', 'mahasiswas', 'perans'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tim_id' => 'required',
            'mahasiswa_id' => 'required',
            'peran_id' => 'required',
            'tanggung_jawab' => 'required',         
        ]); 

        $membertim = Membertim::findOrFail($id);
        $membertim->update($request->all());

        return redirect()->route('membertim.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                
        $membertimskor = Membertimskor::where('member_tim_id', '=', $id)->first();
        $pesan = 'Gagal Karena Data Masih Digunakan Pada Tabel Lain';

        if(!$membertimskor){            
            $membertim = Membertim::findOrFail($id);
            $membertim->delete();
            $pesan = 'Hapus Data Berhasil';
        }                

        return redirect()->route('membertim.index')->withMessage($pesan);
    }
}
