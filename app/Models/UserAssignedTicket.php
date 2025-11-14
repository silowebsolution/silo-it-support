<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAssignedTicket extends Model
{
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userTicket(): BelongsTo
    {
        return $this->belongsTo(UserTicket::class);
    }
}
