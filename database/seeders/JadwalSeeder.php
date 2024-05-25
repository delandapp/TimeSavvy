<?php

namespace Database\Seeders;

use App\Models\jadwal;
use App\Models\jadwal_users;
use App\Models\User;
use Carbon\Carbon;
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
            
                ['nama' => 'Senin', 'waktu' => Carbon::parse('08:00:00')],
                ['nama' => 'Selasa', 'waktu' => Carbon::parse('08:00:00')],
                ['nama' => 'Rabu', 'waktu' => Carbon::parse('08:00:00')],
                ['nama' => 'Kamis', 'waktu' => Carbon::parse('08:00:00')],
                ['nama' => 'Jumat', 'waktu' => Carbon::parse('08:00:00')],
        
        ];
        foreach($data_jadwal as $data) :
            jadwal::insert([
                'hari' => $data['nama'],
                'time' => $data['waktu'],
                'location' => 'SMK N 5 Surakarta',
                'description' => '-',
            ]);
        endforeach;
        $data_user = 1;
        for ($i=1; $i <= count($data_jadwal); $i++) { 
            for ($a=1; $a <= 7 ; $a++) { 
                jadwal_users::create([
                    'id_user' => $data_user,
                    'id_jadwal' => $i,
                ]);
                $data_user++;
            }
        }
    }
}
