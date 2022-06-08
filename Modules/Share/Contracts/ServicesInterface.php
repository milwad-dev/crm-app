<?php

namespace Modules\Share\Contracts;

interface ServicesInterface
{
    public function store($request, $user_id = null);

    public function update($request, $id, $user_id);
}
