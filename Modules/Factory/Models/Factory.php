<?php

namespace Modules\Factory\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    use HasFactory;

    // MARKETING
    const MODEL_CAMPAIGN = 'Campaign';

    // USERS
    const MODEL_USER = 'User';

    static $models = [self::MODEL_CAMPAIGN, self::MODEL_USER];
}
