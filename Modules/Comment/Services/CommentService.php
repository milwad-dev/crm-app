<?php

namespace Modules\Comment\Services;

use Modules\Comment\Models\Comment;
use Modules\RolePermissions\Models\Permission;
use Modules\Share\Contracts\ServicesInterface;
use Modules\Share\Repositories\ShareRepo;

class CommentService implements ServicesInterface
{
    private $class = Comment::class;

    public function store($request, $user_id = null)
    {
        return $this->getData()->create([
            'user_id' => $user_id,
            'status' => $this->statusComment(),
            'comment_id' => array_key_exists("comment_id" , $request) ? $request['comment_id'] : null,
            'body' => $request['body'],
            'commentable_id' => $request['commentable_id'],
            'commentable_type' => $request['commentable_type'],
        ]);
    }

    private function statusComment()
    {
        if (auth()->user()->can(Permission::PERMISSION_MANAGE_COMMENTS) || auth()->user()->can(Permission::PERMISSION_ADMIN)) {
            return Comment::STATUS_APPROVED;
        }

        return Comment::STATUS_NEW;
    }

    public function update($request, $id, $user_id) {} // nothing

    private function getData()
    {
        return ShareRepo::query($this->class);
    }
}
