<?php

namespace App\Models;

use App\Models\Traits\HasTranslatedName;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasTranslatedName;

    const PENDING = 1;
    const IN_PROGRESS = 2;
    const RESOLVED = 3;
    const CLOSED = 4;
}
