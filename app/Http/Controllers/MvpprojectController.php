<?php

namespace App\Http\Controllers;

use App\Models\Mvpproject;
use App\Models\Project;
use Illuminate\Http\Request;

class MvpprojectController extends Controller
{
    public function index()
    {
        $mvpprojects = Mvpproject::all();

        return view('mvpprojects.index', compact('mvpprojects'));
    }

    public function create()
    {
        $mvpprojects = Mvpproject::all();
        $projects = Project::all();

        return view('mvpprojects.create', compact('mvpprojects', 'projects'));
    }

    public function store(Request $request)
    {
        $request['created_by_id'] = 3;

        $this->validate($request,[
            'project_id' => 'required',
            'tanggal_rilis' => 'required|date',
            'deskripsi' => 'required',         
        ]); 

        Mvpproject::create($request->all());

        return redirect()->route('mvpproject.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $mvpproject = Mvpproject::findOrFail($id);

        return view('mvpprojects.show', compact('mvpproject'));
    }

    public function edit($id)
    {
        $mvpproject = Mvpproject::findOrFail($id);
        $projects = Project::all();

        return view('mvpprojects.edit', compact('mvpproject', 'projects]'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tanggal_rilis' => 'required|date',
            'deskripsi' => 'required',         
        ]); 

        $mvpproject = Mvpproject::findOrFail($id);
        $mvpproject->update($request->all());

        return redirect()->route('mvpproject.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                
        $mvpproject = Mvpproject::findOrFail($id);
        $mvpproject->delete();
        $pesan = 'Hapus Data Berhasil';

        return redirect()->route('mvpproject.index')->withMessage($pesan);
    }
}
