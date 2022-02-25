<?php

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment_id', 'commentable_id', 'commentable_type', 'body', 'status'];

    public function commentable()
    {
        return $this->morphTo(); // برای مدل course و مدل های دیگه
        // اسمش چون توی مدل course برای تعریف relation این گذاشتیم اینجا هم اجبار هست همونو بزاریم
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(__CLASS__);
    }

    public function comments()
    {
        return $this->hasMany(__CLASS__);
    }

    public function notApprovedComments()
    {
        return $this->hasMany(__CLASS__)->whereStatus(self::STATUS_NEW);
    }

    public function showCommentable()
    {
        if (is_null($this->commentable->title)) return $this->commentable->name;
        return $this->commentable->title;
    }

    public function statusCss()
    {
        if ($this->status == self::STATUS_APPROVED) return 'success';
        elseif ($this->status == self::STATUS_NEW) return 'warning';
        elseif ($this->status == self::STATUS_REJECTED) return 'danger';
        return 'dark';
    }

    const STATUS_NEW = 'new';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    static $statuses = [
        self::STATUS_NEW,
        self::STATUS_APPROVED,
        self::STATUS_REJECTED,
    ];
}
