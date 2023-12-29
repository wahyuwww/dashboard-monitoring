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
        $user =  new App\Models\User;
        $user->name = "testing";
        $user->email = "admin@gmail.com";
        $user->password = \Hash::make("admin");
        $user->save();
        $this->command->info("user Berhasil Dibuat");
    }
}
