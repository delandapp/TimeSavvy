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
    
                ['name' => 'Muhammad Deland Arjuna Putra', 'email' => 'muhammad.deland36@smk.belajar.id', 'password' => 'admin', 'id_roles' => 1,'id' => 1],
                ['name' => 'Yogha Irgi Kurniawan', 'email' => 'yogha.irgi36@smk.belajar.id', 'password' => 'admin', 'id_roles' => 1, 'id' => 2],
                ['name' => 'Geusan Edurais', 'email' => 'geusan.edurais36@smk.belajar.id', 'password' => 'admin', 'id_roles' => 1, 'id' => 3],
                ['name' => 'Admin', 'email' => 'admin@smk.belajar.id', 'password' => 'admin', 'id_roles' => 3, 'id' => 4],
            
        ];
        foreach($data_siswa as $data) :
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'status' => 'verify',
                'password' => bcrypt($data['password']),
                'id_roles' => $data['id_roles'],
            ]);
            detail_user::create([
                'id_user' => $data['id'],
                'id_alamat' => $data['id'],
                'id_level' => 1,
                'id_jurusan' => random_int(1, 3),
                'id_kelas' => random_int(1, 3),
            ]);
        endforeach;
    }
}
