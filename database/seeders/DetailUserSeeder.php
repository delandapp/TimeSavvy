<?php

namespace Database\Seeders;

use App\Models\detail_user;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        $data_siswa = [

            ['name' => 'rofi', 'name_lengkap' => 'Abia Rafi Nugroho', 'email' => 'abisnugroho@smk.belajar.id', 'password' => 'admin', 'id' => 1],
            ['name' => 'Adit', 'name_lengkap' => 'Adit Tris Wicaksono', 'email' => 'adittriswicaksono@smk.belajar.id', 'password' => 'admin',  'id' => 2],
            ['name' => 'Afiatur', 'name_lengkap' => 'Afiatur Rahman', 'email' => 'afiaturrahman@smk.belajar.id', 'password' => 'admin',  'id' => 3],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya@smk.belajar.id', 'password' => 'admin',  'id' => 4],

        ];

        $data_jurusan = [
            'Rekayasa Perangkat Lunak',
            'Listrik',
            'Mesin',
            'Otomasi',
            'Dpib',
            'Tkp',
        ];

        $data_kelas = [
            'X',
            'XI',
            'XII',
        ];

        $data_nama_kelas = [
            'A',
            'B',
            'C',
        ];

        $data_kota = [
            'Surakarta',
            'Klaten',
            'Boyolali',
            'Karangayar',
        ];

        foreach ($data_siswa as $data) :
            detail_user::create([
                'nama_lengkap' => $data['name_lengkap'],
                'nisn' => '225'.random_int(10, 99),
                'no_hp' => '08'.random_int(10, 99).random_int(10, 99).random_int(10, 99).random_int(10, 99).random_int(10, 99),
                'alamat' => 'Jalan Cipaganti Rt '. random_int(10, 99) . ' Rw ' . random_int(10, 99),
                'kota' => $data_kota[random_int(0, 3)],
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '512' . random_int(10, 99),
                'kelas' => $data_kelas[random_int(0, 2)] . ' ' . $data_nama_kelas[random_int(0, 2)],
                'jurusan' => $data_jurusan[random_int(0, 5)],
            ]);
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'id_details' => $data['id'],
            ]);
        endforeach;
    }
}
