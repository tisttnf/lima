<?php

namespace App\Http\Controllers;

use App\Membertim;
use App\Membertimskor;
use App\User;
use App\Tim;
use App\Peran;
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
        $request['created_by_id'] = $request->user()->id;

        $this->validate($request,[
            'tim_id' => 'required',
            'mahasiswa_id' => 'required',
            'peran_id' => 'required',
            'tanggung_jawab' => 'required',         
        ]); 

        $membertim = Membertim::where('tim_id', '=', $request->tim_id)->where('mahasiswa_id', '=', $request->mahasiswa_id)->first();
        $pesan = 'Gagal Karena Mahasiswa Sudah Ada di dalam Tim Tersebut';

        if(!$membertim){            
            Membertim::create($request->all());
            $pesan = 'Tambah Data Berhasil';
        }

        if($request->user()->role == 'Dosen'){
            return redirect()->route('tim.show', $request->tim_id)->withMessage($pesan);
        }else{
            return redirect()->route('membertim.index')->withMessage($pesan);
        }
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
        if($request->user()->role == 'Admin'){
            $this->validate($request,[
                'tim_id' => 'required',
                'mahasiswa_id' => 'required',
                'peran_id' => 'required',
                'tanggung_jawab' => 'required',       
                'final_skor' => 'numeric|between:0,100',  
            ]); 
        }else if($request->user()->role == 'Dosen'){
            $this->validate($request,[ 
                'final_skor' => 'numeric|between:0,100',  
            ]); 
        }   

        $membertim = Membertim::findOrFail($id);
        $membertim->update($request->all());
        // $membertimfinalskor = Membertim::sum('final_skor');
        // $tim = Tim::findOrFail($membertim->tim_id);
        // $tim->final_skor = $membertimfinalskor / 2;
        // $tim->update();

        if($request->user()->role == 'Dosen'){
            return redirect()->route('tim.show', $membertim->tim_id)->withMessage('Ubah Nilai Berhasil');
        }else{
            return redirect()->route('membertim.index')->withMessage('Ubah Data Berhasil');
        }        
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
