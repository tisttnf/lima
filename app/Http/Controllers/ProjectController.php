<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Mvpproject;
use App\Models\Sprintproject;
use App\Models\Semester;
use App\Models\Tim;
use Illuminate\Http\Request;

use DateTime;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $projects = Project::all();
        $semesters = Semester::all();

        return view('projects.create', compact('projects', 'semesters'));
    }        

    public function store(Request $request)
    {                    
        $tanggal_mulai = date('m/d/Y', strtotime($request['tanggal_mulai']));
        $tanggal_akhir = date('m/d/Y', strtotime($request['tanggal_akhir']));
        $request['jumlah_sprint'] = $this->pekan($tanggal_mulai, $tanggal_akhir);
        $request['budget'] = preg_replace('/\D/', '', $request['budget']);
        $request['created_by_id'] = 1;

        $this->validate($request,[
            'nama' => 'required|unique:project', 
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'budget' => 'required',
            'semester_id' => 'required',  
        ]); 

        Project::create($request->all());

        return redirect()->route('project.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $semesters = Semester::all();
        $tims = Tim::all();

        return view('projects.edit', compact('project', 'semesters', 'tims'));
    }

    public function update(Request $request, $id)
    {
        $tanggal_mulai = date('m/d/Y', strtotime($request['tanggal_mulai']));
        $tanggal_akhir = date('m/d/Y', strtotime($request['tanggal_akhir']));
        $request['jumlah_sprint'] = $this->pekan($tanggal_mulai, $tanggal_akhir);
        $request['budget'] = preg_replace('/\D/', '', $request['budget']);

        $this->validate($request,[
            'nama' => 'required|unique:project,nama,'.$id, 
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'budget' => 'required',
            'persen' => 'required',
            'final_skor' => 'required',     
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('project.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                
        $mvpproject = Mvpproject::where('project_id', '=', $id)->first();
        $sprintproject = SprintProject::where('project_id', '=', $id)->first();
        $pesan = 'Gagal Karena Data Masih Digunakan Pada Tabel Lain';

        if(!$mvpproject and !$sprintproject){            
            $project = Project::findOrFail($id);
            $project->delete();
            $pesan = 'Hapus Data Berhasil';
        }                

        return redirect()->route('project.index')->withMessage($pesan);
    }

    public function pekan($date1, $date2)
    {               
        $first = DateTime::createFromFormat('m/d/Y', $date1);
        $second = DateTime::createFromFormat('m/d/Y', $date2);
        if($date1 > $date2) return $this->pekan($date2, $date1);
        return floor($first->diff($second)->days/7);
    }
}
