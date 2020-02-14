<?php

namespace App\Http\Controllers;

use App\Membertimskor;
use App\Membertim;
use App\User;
use Illuminate\Http\Request;

class MembertimskorController extends Controller
{
    public function index()
    {
        $membertimskors = Membertimskor::all();

        return view('membertimskors.index', compact('membertimskors'));
    }

    public function create()
    {
        $membertimskors = Membertimskor::all();
        $membertims = Membertim::all();

        return view('membertimskors.create', compact('membertimskors', 'membertims'));
    }

    public function store(Request $request)
    {
        $request['penilai_id'] = 2;

        $this->validate($request,[
            'member_tim_id' => 'required',
            'skor' => 'required',
        ]); 

        Membertimskor::create($request->all());

        return redirect()->route('membertimskor.index')->withMessage('Tambah Data Berhasil');
    }

    public function show($id)
    {
        $membertimskor = Membertimskor::findOrFail($id);

        return view('membertimskors.show', compact('membertimskor'));
    }

    public function edit($id)
    {
        $membertimskor = Membertimskor::findOrFail($id);
        $membertims = Membertim::all();

        return view('membertimskors.edit', compact('membertimskor', 'membertims'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'skor' => 'required',
        ]);

        $membertimskor = Membertimskor::findOrFail($id);
        $membertimskor->update($request->all());

        return redirect()->route('membertimskor.index')->withMessage('Ubah Data Berhasil');
    }

    public function destroy($id)
    {                          
        $membertimskor = Membertimskor::findOrFail($id);
        $membertimskor->delete();
        $pesan = 'Hapus Data Berhasil';     

        return redirect()->route('membertimskor.index')->withMessage($pesan);
    }
}
