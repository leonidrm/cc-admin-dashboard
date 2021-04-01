<?php declare(strict_types=1);

namespace Database\Seeders\Auth;

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class UsersRolesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('users_roles');

        $data = [
            'demo.admin@codecrew.us' => ['administrator'],
            'demo.editor@codecrew.us'   => 'editor',
            'demo.client@codecrew.us'   => 'client',
        ];

        foreach ($data as $email => $role) {
            /** @var  $user \App\Models\Auth\User\User */
            $user = \App\Models\Auth\User\User::whereEmail($email)->first();

            if ($user === false ) continue;

            $role = is_array($role) === false ? [$role] : $role;

            $roles = \App\Models\Auth\Role\Role::whereIn('name', $role)->get();

            $user->roles()->attach($roles);
        }

        $this->enableForeignKeys();
    }
}
