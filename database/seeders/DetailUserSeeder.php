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
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya1@smk.belajar.id', 'password' => 'admin',  'id' => 5],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradit1@smk.belajar.id', 'password' => 'admin',  'id' => 6],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya2@smk.belajar.id', 'password' => 'admin',  'id' => 7],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya3@smk.belajar.id', 'password' => 'admin',  'id' => 8],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya4@smk.belajar.id', 'password' => 'admin',  'id' => 9],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya5@smk.belajar.id', 'password' => 'admin',  'id' => 10],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya6@smk.belajar.id', 'password' => 'admin',  'id' => 11],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya7@smk.belajar.id', 'password' => 'admin',  'id' => 12],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya8@smk.belajar.id', 'password' => 'admin',  'id' => 13],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya9@smk.belajar.id', 'password' => 'admin',  'id' => 14],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity1@smk.belajar.id', 'password' => 'admin',  'id' => 15],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity2@smk.belajar.id', 'password' => 'admin',  'id' => 16],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity3@smk.belajar.id', 'password' => 'admin',  'id' => 17],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity4@smk.belajar.id', 'password' => 'admin',  'id' => 18],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity5@smk.belajar.id', 'password' => 'admin',  'id' => 19],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity6@smk.belajar.id', 'password' => 'admin',  'id' => 20],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity7@smk.belajar.id', 'password' => 'admin',  'id' => 21],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity8@smk.belajar.id', 'password' => 'admin',  'id' => 22],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity9@smk.belajar.id', 'password' => 'admin',  'id' => 23],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifradity0@smk.belajar.id', 'password' => 'admin',  'id' => 24],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya11@smk.belajar.id', 'password' => 'admin',  'id' => 25],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya12@smk.belajar.id', 'password' => 'admin',  'id' => 26],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya13@smk.belajar.id', 'password' => 'admin',  'id' => 27],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya14@smk.belajar.id', 'password' => 'admin',  'id' => 28],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya15@smk.belajar.id', 'password' => 'admin',  'id' => 29],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya16@smk.belajar.id', 'password' => 'admin',  'id' => 30],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya17@smk.belajar.id', 'password' => 'admin',  'id' => 31],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya18@smk.belajar.id', 'password' => 'admin',  'id' => 32],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya19@smk.belajar.id', 'password' => 'admin',  'id' => 33],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya20@smk.belajar.id', 'password' => 'admin',  'id' => 34],
            ['name' => 'alif', 'name_lengkap' => 'Alif Raditya Arifin', 'email' => 'alifraditya21@smk.belajar.id', 'password' => 'admin',  'id' => 35],

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
