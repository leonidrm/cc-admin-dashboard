<?php declare(strict_types=1);

namespace Database\Seeders\Auth;

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
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
        $this->truncate('companies');

        $companies = [
            [
                'name'        => 'BB2 Insurance Group',
                'logo'        => '',
                'industry_id' => 1,
                'active'      => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Tesla',
                'logo'        => '',
                'industry_id' => 2,
                'active'      => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];

        DB::table('companies')->insert($companies);

        $this->enableForeignKeys();
    }
}
