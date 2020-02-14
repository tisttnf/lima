<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
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
        return Validator::make($data, [
            'nama' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'nohp' => 'required|unique:user',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'role' => $data['role'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nohp' => $data['nohp'],
        ]);
    }
}
