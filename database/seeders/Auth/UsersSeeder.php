<?php declare(strict_types=1);

namespace Database\Seeders\Auth;

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UsersSeeder extends Seeder
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
        $this->truncate('users');

        $users = [
            [
                'name'              => 'Admin',
                'email'             => 'demo.admin@codecrew.us',
                'password'          => bcrypt('admin'),
                'company_id'        => null,
                'active'            => true,
                'confirmation_code' => Uuid::uuid4(),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => 'Demo',
                'email'             => 'demo.editor@codecrew.us',
                'password'          => bcrypt('editor'),
                'company_id'        => null,
                'active'            => true,
                'confirmation_code' => Uuid::uuid4(),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => 'Demo Client',
                'email'             => 'demo.client@codecrew.us',
                'password'          => bcrypt('client'),
                'company_id'        => 2,
                'active'            => true,
                'confirmation_code' => Uuid::uuid4(),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ];

        DB::table('users')->insert($users);

        $this->enableForeignKeys();
    }
}
