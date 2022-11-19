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
        $this->call(UsersTableSeeder::class);
        $this->call(LaratrustSeeder::class);
//        $this->call(PetambakSeeder::class);
        // $this->call(PemasokSeeder::class);
        // $this->call(KaryawanSeeder::class);
        // $this->call(HasilTambakSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
    }
}
