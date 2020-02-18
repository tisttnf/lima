<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Projectowner;
use App\Dosen;
use App\Asistendosen;
use App\Mahasiswa;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        if($data['role'] == 'Dosen'){
            return Validator::make($data, [
                'nama' => 'required|string|max:255',
                'role' => 'required',
                'email' => 'required|string|email|max:255|unique:user',
                'password' => 'required|string|min:6|confirmed',
                'nohp' => 'required|unique:user',
                'nidn' => 'required|unique:dosen',
            ]);
        }else if($data['role'] == 'Asisten Dosen'){
            return Validator::make($data, [
                'nama' => 'required|string|max:255',
                'role' => 'required',
                'email' => 'required|string|email|max:255|unique:user',
                'password' => 'required|string|min:6|confirmed',
                'nohp' => 'required|unique:user',
                'nim' => 'required|unique:asisten_dosen',
            ]);
        }else if($data['role'] == 'Asisten Dosen'){
            return Validator::make($data, [
                'nama' => 'required|string|max:255',
                'role' => 'required',
                'email' => 'required|string|email|max:255|unique:user',
                'password' => 'required|string|min:6|confirmed',
                'nohp' => 'required|unique:user',
                'nim' => 'required|unique:mahasiswa',
            ]);
        }else{
            return Validator::make($data, [
                'nama' => 'required|string|max:255',
                'role' => 'required',
                'email' => 'required|string|email|max:255|unique:user',
                'password' => 'required|string|min:6|confirmed',
                'nohp' => 'required|unique:user',
            ]);
        }
    }

    protected function create(array $data)
    {
        if($data['role'] == 'Project Owner'){
            return Projectowner::create([
                'nama' => $data['nama'],
                'role' => $data['role'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nohp' => $data['nohp'],
            ]);
        }else if($data['role'] == 'Dosen'){
            return Dosen::create([
                'nama' => $data['nama'],
                'role' => $data['role'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nohp' => $data['nohp'],
                'nidn' => $data['nidn'],
            ]);
        }else if($data['role'] == 'Asisten Dosen'){
            return Asistendosen::create([
                'nama' => $data['nama'],
                'role' => $data['role'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nohp' => $data['nohp'],
                'nim' => $data['nim'],
            ]);
        }else if($data['role'] == 'Mahasiswa'){
            return Mahasiswa::create([
                'nama' => $data['nama'],
                'role' => $data['role'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nohp' => $data['nohp'],
                'nim' => $data['nim'],
            ]);
        }else{
            return Admin::create([
                'nama' => $data['nama'],
                'role' => $data['role'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nohp' => $data['nohp'],
            ]);
        }        
    }
}
