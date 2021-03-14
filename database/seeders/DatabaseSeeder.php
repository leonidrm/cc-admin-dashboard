<?php declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Auth\RolesSeeder;
use Database\Seeders\Auth\UsersRolesSeeder;
use Database\Seeders\Auth\UsersSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(UsersRolesSeeder::class);
    }
}
