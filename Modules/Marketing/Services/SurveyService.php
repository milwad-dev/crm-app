<?php

namespace Modules\Marketing\Services;

use Modules\Marketing\Models\Survey;
use Modules\Share\Contracts\ServicesInterface;
use Modules\Share\Repositories\ShareRepo;

class SurveyService implements ServicesInterface
{
    private $class = Survey::class;

    public function store($request, $user_id = null)
    {
        return $this->getData()->create([
            'user_id' => $user_id,
            'name' => $request->name,
            'status' => $request->status,
            'body' => $request->body,
        ]);
    }

    public function update($request, $id, $user_id)
    {
        return $this->getData()->where('user_id', $user_id)->whereId($id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'body' => $request->body,
        ]);
    }

    private function getData()
    {
        return ShareRepo::query($this->class);
    }
}
