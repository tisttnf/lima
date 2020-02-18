<?php

namespace App\Http\Controllers;

use App\Prodi;
use Illuminate\Http\Request;

class APIProdiController extends Controller
{
    public function index(){
        $prodis = Prodi::all();
        return response()->json(['data'=>$prodis]);
    }
}
