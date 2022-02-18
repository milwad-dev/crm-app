<?php

namespace Modules\Share\Contracts;

interface ServicesInterface
{
    public function store($request);

    public function update($request, $id, $user_id);
}
