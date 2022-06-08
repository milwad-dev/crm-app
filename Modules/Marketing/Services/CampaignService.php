<?php

namespace Modules\Marketing\Services;

use Modules\Marketing\Models\Campaign;
use Modules\Share\Contracts\ServicesInterface;
use Modules\Share\Repositories\ShareRepo;

class CampaignService implements ServicesInterface
{
    private $class = Campaign::class;

    public function store($request, $user_id = null)
    {
        return $this->getData()->create([
            'campaign_id' => $request->campaign_id,
            'user_id' => $user_id,
            'name' => $request->name,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'type_money' => $request->type_money,
            'count_email_readed' => $request->count_email_readed,
            'budget' => $request->budget,
            'real_cost' => $request->real_cost,
            'expected_income' => $request->expected_income,
            'expected_cost' => $request->expected_cost,
            'answer' => $request->answer,
            'target' => $request->target,
            'description' => $request->description,
        ]);
    }

    public function update($request, $id, $user_id)
    {
        return $this->getData()->where('user_id', $user_id)->whereId($id)->update([
            'campaign_id' => $request->campaign_id,
            'name' => $request->name,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'type_money' => $request->type_money,
            'count_email_readed' => $request->count_email_readed,
            'budget' => $request->budget,
            'real_cost' => $request->real_cost,
            'expected_income' => $request->expected_income,
            'expected_cost' => $request->expected_cost,
            'answer' => $request->answer,
            'target' => $request->target,
            'description' => $request->description,
        ]);
    }

    private function getData()
    {
        return ShareRepo::query($this->class);
    }
}
