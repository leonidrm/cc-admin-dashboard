<?php declare(strict_types=1);

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Newsletter
 * @package App\Models
 * @property int               $campaign_id
 * @property string            $subject
 * @property string            $variant
 * @property array             $tags
 * @property string            $list
 * @property DateTimeImmutable $send_date
 * @property string            $week_day
 * @property int               $total_recipients
 * @property int               $unique_placed_orders
 * @property float             $placed_order_rate
 * @property float             $revenue
 * @property int               $unique_opens
 * @property float             $open_rate
 * @property int               $total_opens
 * @property int               $unique_clicks
 * @property float             $click_rate
 * @property int               $total_clicks
 * @property int               $unsubscribes
 * @property int               $spam_complaints
 * @property float             $spam_complaints_rate
 * @property int               $successful_deliveries
 * @property int               $bounces
 * @property float             $bounce_rate
 * @property string            $campaign_channel
 * @property boolean           $winning
 * @property DateTimeImmutable $create_at
 * @property DateTimeImmutable $updated_at
 */
class Newsletter extends Model
{
    use HasFactory;

    protected $casts = [
        'tags' => 'array',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
