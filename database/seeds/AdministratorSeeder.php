<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "admin@majoo.com";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("adminmajoo");
        $administrator->address = "Sarmili, Bintaro, Tangerang Selatan";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
