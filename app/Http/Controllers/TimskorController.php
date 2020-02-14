<?php

namespace App\Http\Controllers;

use App\Timskor;
use App\Tim;
use App\User;
use Illuminate\Http\Request;

class TimskorController extends Controller
{
    public function index()
    {
        $timskors = Timskor::all();

        return view('timskors.index', compact('timskors'));
    }

    public function create()
    {
        $timskors = Timskor::all();
        $tims = Tim::all();

        return view('timskors.create', compact('timskors', 'tims'));
    }

    public function store(Request $request)
    {
        $request['penilai_id'] = 2;

        $this->validate($request,[
            'tim_id' => 'required',
            'skor' => 'required',
        ]); 

        Timskor::create($request->all());

        return redirect()->route('timskor.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $timskor = Timskor::findOrFail($id);

        return view('timskors.show', compact('timskor'));
    }

    public function edit($id)
    {
        $timskor = Timskor::findOrFail($id);
        $tims = Tim::all();

        return view('timskors.edit', compact('timskor', 'tims'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'skor' => 'required',
        ]);

        $timskor = Timskor::findOrFail($id);
        $timskor->update($request->all());

        return redirect()->route('timskor.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                          
        $timskor = Timskor::findOrFail($id);
        $timskor->delete();
        $pesan = 'Hapus Data Berhasil';     

        return redirect()->route('timskor.index')->withMessage($pesan);
    }
}
