<?php

namespace Modules\Factory\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    use HasFactory;

    // COMMENT
    const MODEL_COMMENT = 'Comment';

    // MARKETING
    const MODEL_CAMPAIGN = 'Campaign';
    const MODEL_SURVEY = 'Survey';

    // USERS
    const MODEL_USER = 'User';

    static $models = [
        self::MODEL_COMMENT, // COMMENT
        self::MODEL_CAMPAIGN, self::MODEL_SURVEY, // MARKETING
        self::MODEL_USER, // USERS
    ];
}
