<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Newsletter extends Model
{
    use HasFactory;

    public function Campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
