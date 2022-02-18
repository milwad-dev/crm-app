<?php

namespace Modules\Share\Contracts;

interface RepositoriesQueryInterface
{
    public function index($user_id);

    public function findById($user_id, $id);

    public function delete($user_id, $id);
}
