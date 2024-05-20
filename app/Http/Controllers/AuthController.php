<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRecource;
use App\Models\detail_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function authLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->with('role')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }


        if ($user['status'] == 'tidak verify') {
            throw ValidationException::withMessages([
                'user' => ['User belum di verify'],
            ]);
        }

        $user['token'] = $user->createToken('user login')->plainTextToken;

        return response([
            "status" => 200,
            "message" => "Login Berhasil",
            'data' => new UserRecource($user)
        ], 200);
    }

    public function authRegister(Request $request) {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nisn' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $data_email = explode('@', $data['email']);
        if ($data_email[1] != "smkn5solo.sch.id") {
            throw ValidationException::withMessages([
                'email' => ['Email harus @smkn5solo.sch.id'],
            ]);
        }

        $data['password'] = Hash::make($data['password']);

        $user = User::create([
            'name' => $data['name'],
            'password' => $data['password'],
            'email' => $data['email'],
        ]);
        $id_user = User::select('id')->latest()->first();
        $details_user = detail_user::create([
            'id_user' => $id_user->id,
            'nisn' => $data['nisn'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'kota' => $data['kota'],
            'provinsi' => $data['provinsi'],
            'kode_pos' => $data['kode_pos'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
        ]);

        $user = User::with('detail_users')->where('id', $id_user->id)->first();
        return response([
            "status" => 201,
            "message" => "Register Berhasil",
            'data' => new UserRecource($user)
        ], 201);
    }
}
