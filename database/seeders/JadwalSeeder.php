<?php

namespace Database\Seeders;

use App\Models\jadwal;
use App\Models\jadwal_users;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        jadwal::truncate();
        Schema::enableForeignKeyConstraints();
        $data_jadwal = [
            
                ['nama' => 'Senin', 'waktu' => null],
                ['nama' => 'Selasa', 'waktu' => null],
                ['nama' => 'Rabu', 'waktu' => null],
                ['nama' => 'Kamis', 'waktu' => null],
                ['nama' => 'Jumat', 'waktu' => null],
        
        ];
        foreach($data_jadwal as $data) :
            jadwal::insert([
                'hari' => $data['nama'],
                'waktu' => $data['waktu'],
            ]);
        endforeach;
        $data_user = 1;
        for ($i=0; $i < count($data_jadwal); $i++) { 
            for ($a=1; $a <= 6 ; $a++) { 
                jadwal_users::insert([
                    'id_user' => $data_user,
                    'id_jadwal' => $i,
                ]);
                $data_user++;
            }
        }
    }
}
