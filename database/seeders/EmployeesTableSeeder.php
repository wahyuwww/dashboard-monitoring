<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->insert([
            'tanggal' => 'testing',
            'nama' => 'testaja',
            'telp' => '0982881',
            'kota' => 'surabaya',
            'prov' => 'jatim',
            'sumber' => 'facebook',
            'iklan' => 'iklanin aja',
            'jam' => '14.14',
        ]);

    }
}
