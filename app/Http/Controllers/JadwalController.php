<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;
use App\Http\Resources\HariRecource;
use App\Http\Resources\JadwalRecource;
use App\Models\jadwal_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function getHari () {
        $data = jadwal::get();
        return response([
            'status' => 200,
            'message' => 'Success get data jadwal',
            'data' => HariRecource::collection($data),
        ]);
    }

    public function getJadwal()
    {
        $jurusan = Auth::user()->detail_users->jurusan;

        $data = Jadwal::with(['user' => function ($query) use ($jurusan) {
            $query->whereRelation('detail_users', 'jurusan', '=', $jurusan)->with('detail_users')->withPivot('id');
        }])->get();
        // return response([$data]);

        return response([
            'status' => 200,
            'message' => 'Success get data jadwal',
            'data' => JadwalRecource::collection($data),
        ]);

        // $jadwal = Jadwal::all();

        // $data = collect([]);

        // // Kemudian, saat Anda membutuhkan data 'user' untuk jadwal tertentu:
        // foreach ($jadwal as $itemJadwal) {
        //     $itemJadwal->load(['user' => function ($query) use ($jurusan) {
        //         $query->whereRelation('detail_users', 'jurusan', '=', $jurusan);
        //     }]);

        //     // Sekarang Anda dapat mengakses data 'user' dan 'detail_users' yang sudah difilter:
        //     foreach ($itemJadwal->user as $user) {
        //         if ($user->detail_users) { // Memastikan detail_users ada
        //             $data->push($user); // Menggunakan push untuk menambahkan ke Collection
        //         }
        //     }
        // }
        // return response()->json($jadwal);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createJadwal(Request $request)
    {
        $data = $request->validate([
            'id_jadwal' => 'required',
            'id_user' => 'required',
            'waktu' => 'required',
        ]);

        $data = jadwal_users::create($data);
        $data = jadwal::with(['user' => function ($query) use ($request) {
            $query->where('id_user', '=', $request['id_user']);
        }])->first();

        return response([
            'status' => 200,
            'message' => 'Success create jadwal',
            'data' => new JadwalRecource($data),
        ]);
    }
    public function editJadwal(Request $request, $id)
    {
        $data = $request->validate([
            'id_jadwal' => 'required',
            'id_user' => 'required',
        ]);
        $data_jadwal = jadwal_users::where('id', $id)->first();
        if(!$data_jadwal) {
            return response()->json(['success' => false, 'message' => 'Jadwal Not Found'], 404);
        }
        $data_jadwal->update([
            'id_jadwal' => $request['id_jadwal'],
            'id_user' => $request['id_user'],
        ]);
        $data = jadwal::where('id', $data['id_jadwal'])->with(['user' => function ($query) use ($request) {
            $query->where('id_user', '=', $request['id_user']);
        }])->first();

        return response([
            'status' => 200,
            'message' => 'Success Update Jadwal',
            'data' => new JadwalRecource($data),
        ]);
    }
    public function deleteJadwal($id)
    {
        $jadwal = jadwal_users::where('id', $id)->first();
        if(!$jadwal) {
            return response()->json(['success' => false, 'message' => 'jadwal not found'], 404);
        }
        $message = response()->json(['success' => true, 'data' => $jadwal]);
        $jadwal->delete();
        return $message;
    }
}
