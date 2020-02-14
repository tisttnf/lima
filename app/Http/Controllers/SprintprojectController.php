<?php

namespace App\Http\Controllers;

use App\Sprintproject;
use App\Project;
use App\Logproject;
use Illuminate\Http\Request;

class SprintprojectController extends Controller
{
    public function index()
    {
        $sprintprojects = Sprintproject::all();

        return view('sprintprojects.index', compact('sprintprojects'));
    }

    public function create()
    {
        $sprintprojects = Sprintproject::all();
        $projects = Project::all();

        return view('sprintprojects.create', compact('sprintprojects', 'projects'));
    }

    public function store(Request $request)
    {
        $request['created_by'] = 3;

        $this->validate($request,[
            'tanggal_rilis' => 'required|date',
            'deskripsi' => 'required',         
        ]); 

        Sprintproject::create($request->all());

        return redirect()->route('sprintproject.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $sprintproject = Sprintproject::findOrFail($id);

        return view('sprintprojects.show', compact('sprintproject'));
    }

    public function edit($id)
    {
        $sprintproject = Sprintproject::findOrFail($id);
        $projects = Project::all();

        return view('sprintprojects.edit', compact('sprintproject', 'projects]'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tanggal_rilis' => 'required|date',
            'deskripsi' => 'required',         
        ]); 

        $sprintproject = Sprintproject::findOrFail($id);
        $sprintproject->update($request->all());

        return redirect()->route('sprintproject.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                
        $logproject = Logproject::where('sprint_id', '=', $id)->first();
        $pesan = 'Gagal Karena Data Masih Digunakan Pada Tabel Lain';

        if(!$logproject){            
            $sprintproject = Sprintproject::findOrFail($id);
            $sprintproject->delete();
            $pesan = 'Hapus Data Berhasil';
        }   

        return redirect()->route('sprintproject.index')->withMessage($pesan);
    }
}
