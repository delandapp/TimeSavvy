<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\detail_user;
use Illuminate\Http\Request;
use App\Http\Resources\UserRecource;
use Illuminate\Support\Facades\Auth;
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

        $user = User::where('email', $data['email'])->first();

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
            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'token' => $user->token,
            ]
        ], 200);
    }

    public function authRegister(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
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

        $details_user = detail_user::create([
            'nisn' => $data['nisn'],
            'nama_lengkap' => $data['nama_lengkap'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'kota' => $data['kota'],
            'provinsi' => $data['provinsi'],
            'kode_pos' => $data['kode_pos'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
        ]);

        $user = User::create([
            'id_details' => $details_user->id,
            'name' => $data['name'],
            'password' => $data['password'],
            'email' => $data['email'],
        ]);

        $user = User::with('detail_users')->where('id', $user->id)->first();
        return response([
            "status" => 201,
            "message" => "Register Berhasil",
            'data' => new UserRecource($user)
        ], 201);
    }

    public function getUser()
    {
        $data = User::with('detail_users')->whereRelation('detail_users', 'jurusan', '=', Auth::user()->detail_users->jurusan)->get();
        return response([
            'status' => 200,
            'message' => 'Success get data user',
            'data' =>  UserRecource::collection($data),
        ]);
    }

    public function editUser(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'nisn' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $data_user = User::where('id', $id)->with('detail_users')->first();

        if (!$data_user) {
            return response()->json(['success' => false, 'message' => 'Jadwal Not Found'], 404);
        }
        $data_user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $data_user->detail_users->update([
            'nisn' => $data['nisn'],
            'nama_lengkap' => $data['nama_lengkap'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'kota' => $data['kota'],
            'provinsi' => $data['provinsi'],
            'kode_pos' => $data['kode_pos'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
        ]);

        return response([
            "status" => 201,
            "message" => "Berhasil Update Users",
            'data' => $data_user
        ], 201);
    }
    public function deleteUser($id)
    {
        $data_user = detail_user::where('id', $id)->with('user')->first();
        if (!$data_user) {
            return response()->json(['success' => false, 'message' => 'users not found'], 404);
        }

        $message = response([
            "status" => 201,
            "message" => "Berhasil Delete Users",
            'data' => $data_user
        ], 201);

        // Hapus data di tabel pivot 'user_jadwal'
        $data_user->user->jadwal()->detach();
        $data_user->user()->delete();
        $data_user->delete();
        return $message;
    }

    public function logout(Request $request)
    {
        // Hapus token yang sedang digunakan (current access token)
        
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
