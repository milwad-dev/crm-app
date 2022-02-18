<?php

namespace Modules\Marketing\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id', 'user_id', 'name', 'status', 'start_date', 'end_date', 'type', 'type_money', 'count_email_readed',
        'budget', 'real_cost', 'expected_income', 'expected_cost', 'answer', 'target', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getParentAttribute()
    {
        return (is_null($this->parent_id)) ? 'NO' : $this->parentCategory->title;
    }

    public function parentCategory()
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function statusCss()
    {
        if ($this->status == self::STATUS_SENDING || $this->status == self::STATUS_IN_QUEUE || $this->status == self::STATUS_PLANNING) return 'warning';
        else if ($this->status == self::STATUS_ACTIVE || $this->status == self::STATUS_COMPLETE) return 'success';
        else if ($this->status == self::STATUS_INACTIVE) return 'danger';
        else return 'dark';
    }

    const STATUS_PLANNING = 'planning';
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_COMPLETE = 'complete';
    const STATUS_IN_QUEUE = 'in queue';
    const STATUS_SENDING = 'sending';

    static $statuses = [
        self::STATUS_PLANNING, self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_COMPLETE, self::STATUS_IN_QUEUE,
        self::STATUS_SENDING
    ];

    const TYPE_TELESALES = 'telesales';
    const TYPE_MAIL = 'mail';
    const TYPE_EMAIL = 'email';
    const TYPE_PRINT = 'print';
    const TYPE_WEB = 'web';
    const TYPE_RADIO = 'radio';
    const TYPE_TELEVISION = 'television';
    const TYPE_NEWSLETTER = 'newsletter';
    const TYPE_SEMINARS = 'seminars';

    static $types = [
        self::TYPE_TELESALES, self::TYPE_MAIL, self::TYPE_EMAIL, self::TYPE_PRINT, self::TYPE_WEB, self::TYPE_RADIO,
        self::TYPE_TELEVISION, self::TYPE_NEWSLETTER, self::TYPE_SEMINARS
    ];

    const TYPE_MONEY_DOLLAR = 'dollar';
    const TYPE_MONEY_RIAL = 'rial';
    const TYPE_MONEY_EURO = 'euro';

    static $type_moneies = [self::TYPE_MONEY_DOLLAR, self::TYPE_MONEY_RIAL, self::TYPE_MONEY_EURO];

    const ANSWER_EXCELLENT = 'excellent';
    const ANSWER_GOOD = 'good';
    const ANSWER_AVERAGE = 'average';
    const ANSWER_POOR = 'poor';

    static $answers = [self::ANSWER_EXCELLENT, self::ANSWER_GOOD, self::ANSWER_AVERAGE, self::ANSWER_POOR];
}
