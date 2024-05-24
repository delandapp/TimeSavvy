<?php

namespace Database\Seeders;

use App\Models\jadwal;
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
    }
}
