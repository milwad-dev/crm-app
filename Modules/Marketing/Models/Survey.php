<?php

namespace Modules\Marketing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Traits\HasComments;
use Modules\User\Models\User;

class Survey extends Model
{
    use HasFactory;
    use HasComments;

    protected $fillable = ['user_id', 'name', 'status', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusCss()
    {
        if ($this->status == self::STATUS_DRAFT || $this->status == self::STATUS_INACTIVE ) return 'warning';
        else if ($this->status == self::STATUS_ACTIVE) return 'success';
        else return 'dark';
    }

    const STATUS_DRAFT = 'draft';
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    static $statuses = [self::STATUS_DRAFT, self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    //    protected $casts = ['questions' => 'array'];
//    public function setPropertiesAttribute($value)
//    {
//        $questions = [];
//        foreach ($value as $array_item) {
//            if (!is_null($array_item['key'])) $questions[] = $array_item;
//        }
//        $this->attributes['questions'] = json_encode($questions);
//    }
}

