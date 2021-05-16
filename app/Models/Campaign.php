<?php declare(strict_types=1);

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Campaign
 * @package App\Models
 * @property int               $id
 * @property string            $name
 * @property int               $company_id
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Campaign extends Model
{
    use HasFactory;

    public function newsletter(): HasMany
    {
        return $this->hasMany(Newsletter::class);
    }
}
