<?php declare(strict_types=1);

namespace Database\traits;

use Illuminate\Support\Facades\DB

/**
 * Class TruncateTable.
 */
trait TruncateTable
{
    /**
     * @param $table
     *
     * @return mixed
     */
    protected function truncate(string $table)
    {
        switch (DB::getDriverName()) {
            case 'mysql':
                return DB::table($table)->truncate();

            case 'pgsql':
                return  DB::statement('TRUNCATE TABLE '.$table.' RESTART IDENTITY CASCADE');

            case 'sqlite':
                return DB::statement('DELETE FROM '.$table);
        }

        return false;
    }

    /**
     * @param array $tables
     */
    protected function truncateMultiple(array $tables): void
    {
        foreach ($tables as $table) {
            $this->truncate($table);
        }
    }
}
