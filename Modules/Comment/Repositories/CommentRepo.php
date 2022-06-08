<?php

namespace Modules\Comment\Repositories;

use Modules\Comment\Models\Comment;
use Modules\Share\Contracts\RepositoriesQueryInterface;
use Modules\Share\Repositories\ShareRepo;

class CommentRepo implements RepositoriesQueryInterface
{
    private $class = Comment::class;

    public function index($user_id)
    {
        return $this->query()->where('user_id', $user_id)->latest();
    }

    public function findById($user_id, $id)
    {
        return $this->query()->where('user_id', $user_id)->findOrFail($id);
    }

    public function delete($user_id, $id)
    {
        return $this->query()->where('user_id', $user_id)->whereId($id)->delete();
    }

    public function findApproved($user_id, $id)
    {
        return Comment::query()->whereStatus(Comment::STATUS_APPROVED)->where('user_id', $user_id)->whereId($id)->first();
    }

    public function updateStatus($user_id, $id , $status)
    {
        return Comment::query()->where('user_id', $user_id)->whereId($id)->update(['status' => $status]);
    }

    private function query()
    {
        return ShareRepo::query($this->class);
    }
}
