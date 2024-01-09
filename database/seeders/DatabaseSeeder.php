<?php


use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $employee =  new App\Models\Employee;
        $employee->tanggal = "Kamis, 05 Januari 2024";
        $employee->nama = "Abi";
        $employee->telp = "0982881";
        $employee->kota = "Malang";
        $employee->prov = "Jawa Timur";
        $employee->sumber = "Facebook";
        $employee->iklan = "Iklan paket usaha distro terbaru";
        $employee->jam = "14.10";
        $employee->save();
        $this->command->info("employee Berhasil Dibuat");
    }
}
