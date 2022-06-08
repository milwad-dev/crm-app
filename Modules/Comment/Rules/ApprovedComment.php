<?php

namespace Modules\Comment\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Comment\Repositories\CommentRepo;

class ApprovedComment implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $commentRepo = new CommentRepo();
        return ! is_null($commentRepo->findApproved($value));
    }

    public function message()
    {
        return 'There is a Problem.';
    }
}
