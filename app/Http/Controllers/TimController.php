<?php

namespace App\Http\Controllers;

use App\Tim;
use App\Semester;
use App\Prodi;
use App\User;
use App\Membertim;
use App\Timskor;
use App\Mahasiswa;
use App\Peran;
use Illuminate\Http\Request;

class TimController extends Controller
{
    public function index()
    {
        $tims = Tim::all();

        return view('tims.index', compact('tims'));
    }

    public function create()
    {
        $tims = Tim::all();
        $semesters = Semester::all();
        $prodis = Prodi::all();

        return view('tims.create', compact('tims', 'semesters', 'prodis'));
    }

    public function store(Request $request)
    {
        $request['created_by_id'] = $request->user()->id;

        $this->validate($request,[
            'nama' => 'required|unique:tim',
            'semester_id' => 'required',
            'prodi_id' => 'required',         
        ]); 

        Tim::create($request->all());

        return redirect()->route('tim.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $tim = Tim::findOrFail($id);
        $asisten_dosens = User::where('role', 'Asisten Dosen')->get();
        $membertims = Membertim::where('tim_id', '=', $id)->get();
        $mahasiswas = Mahasiswa::all();
        $perans = Peran::all();

        return view('tims.show', compact('tim', 'asisten_dosens', 'membertims', 'mahasiswas', 'perans'));
    }

    public function edit($id)
    {
        $tim = Tim::findOrFail($id);
        $semesters = Semester::all();
        $prodis = Prodi::all();
        $asisten_dosens = User::where('role', 'Asisten Dosen')->get();

        return view('tims.edit', compact('tim', 'semesters', 'prodis', 'asisten_dosens'));
    }

    public function update(Request $request, $id)
    {
        if($request->user()->role == 'Admin'){
            $this->validate($request,[
                'nama' => 'required|unique:tim,nama,'.$id, 
            ]);
        }        

        $tim = Tim::findOrFail($id);
        $tim->update($request->all());

        if($request->user()->role == 'Dosen'){
            return redirect()->route('tim.show', $id)->withMessage('Ubah Asisten Dosen Berhasil');
        }else{
            return redirect()->route('tim.index')->withMessage('Ubah Data Berhasil');
        }        
    }

    public function destroy($id)
    {                
        $membertim = Membertim::where('tim_id', '=', $id)->first();
        $timskor = Timskor::where('tim_id', '=', $id)->first();
        $pesan = 'Gagal Karena Data Masih Digunakan Pada Tabel Lain';

        if(!$membertim and !$timskor){            
            $tim = Tim::findOrFail($id);
            $tim->delete();
            $pesan = 'Hapus Data Berhasil';
        }                

        return redirect()->route('tim.index')->withMessage($pesan);
    }
}
