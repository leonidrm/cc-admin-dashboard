<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;

class Company extends Model
{
    use HasFactory,
        Sortable;

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }
}
