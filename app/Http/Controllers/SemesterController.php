<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Project;
use App\Models\Tim;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();

        return view('semesters.index', compact('semesters'));
    }

    public function create()
    {
        $semesters = Semester::all();

        return view('semesters.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|unique:semester',         
        ]); 

        Semester::create($request->all());

        return redirect()->route('semester.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $semester = Semester::findOrFail($id);

        return view('semesters.show', compact('semester'));
    }

    public function edit($id)
    {
        $semester = Semester::findOrFail($id);

        return view('semesters.edit', compact('semester'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|unique:semester',         
        ]);

        $semester = Semester::findOrFail($id);
        $semester->update($request->all());

        return redirect()->route('semester.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                
        $project = Project::where('semester_id', '=', $id)->first();
        $tim = Tim::where('semester_id', '=', $id)->first();
        $pesan = 'Gagal Karena Data Masih Digunakan Pada Tabel Lain';

        if(!$project and !$tim){            
            $semester = Semester::findOrFail($id);
            $semester->delete();
            $pesan = 'Hapus Data Berhasil';
        }                

        return redirect()->route('semester.index')->withMessage($pesan);
    }
}
