<?php

namespace Modules\Marketing\Repositories;

use Modules\Marketing\Models\Survey;
use Modules\Share\Contracts\RepositoriesQueryInterface;
use Modules\Share\Repositories\ShareRepo;

class SurveyRepo implements RepositoriesQueryInterface
{
    private string $class = Survey::class;

    public function index($user_id)
    {
        return $this->getDataByUserId($user_id)->latest();
    }

    public function findById($user_id, $id)
    {
        return $this->getDataByUserId($user_id)->findOrFail($id);
    }

    public function delete($user_id, $id)
    {
        return $this->getDataByUserId($user_id)->whereId($id)->delete();
    }

    public function getAll($user_id)
    {
        return $this->getDataByUserId($user_id)->get();
    }

    public function getAllWithoutId($user_id, $id)
    {
        return $this->getDataByUserId($user_id)->where('id', '!=', $id)->get();
    }

    private function getDataByUserId($user_id)
    {
        return ShareRepo::query($this->class)->where('user_id', $user_id);
    }
}
