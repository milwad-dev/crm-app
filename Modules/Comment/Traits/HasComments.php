<?php

namespace Modules\Comment\Traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Modules\Comment\Models\Comment;

trait HasComments
{
    use HasRelationships;

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function approvedComments()
    {
        return $this->morphMany(Comment::class , 'commentable')
            ->whereStatus(Comment::STATUS_APPROVED)
            ->whereNull('comment_id')
            ->with('comments');
    }
}
