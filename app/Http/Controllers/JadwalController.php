<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Http\Requests\StorejadwalRequest;
use App\Http\Requests\UpdatejadwalRequest;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getJadwal()
    {
        $jurusan = Auth::user()->detail_users->jurusan;

        $jadwal = Jadwal::with(['user' => function ($query) use ($jurusan) {
            $query->whereRelation('detail_users', 'jurusan', '=', $jurusan);
        }])->get();
    
        return response()->json($jadwal[0]);

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
        return response()->json($jadwal);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejadwalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejadwalRequest $request, jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jadwal $jadwal)
    {
        //
    }
}
