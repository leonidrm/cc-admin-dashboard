<?php declare(strict_types=1);

namespace Database\Seeders\Auth;

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('roles');

        $roles = [
            ['name' => 'administrator'],
            ['name' => 'editor'],
            ['name' => 'client'],
        ];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}
