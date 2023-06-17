<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa_MataKuliah;


class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // MahasiswaMataKuliah::factory(10)->create();
        Mahasiswa_MataKuliah::create([
            'mahasiswa_id' => '1',
            'matakuliah_id' => '1',
            'nilai' => 'A',
        ]);

        Mahasiswa_MataKuliah::create([
            'mahasiswa_id' => '1',
            'matakuliah_id' => '2',
            'nilai' => 'A',
        ]);

        Mahasiswa_MataKuliah::create([
            'mahasiswa_id' => '1',
            'matakuliah_id' => '3',
            'nilai' => 'A',
        ]);

        Mahasiswa_MataKuliah::create([
            'mahasiswa_id' => '2',
            'matakuliah_id' => '1',
            'nilai' => 'E',
        ]);


    }
}
