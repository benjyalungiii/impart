<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beacon extends Model
{
    use HasFactory;

    const BEACON_STATUS_DRAFT = 0;
    const BEACON_STATUS_IN_REVIEW = 1;
    const BEACON_STATUS_PUBLISHED = 2;

    protected $table = "beacons";

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
