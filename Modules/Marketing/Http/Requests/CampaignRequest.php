<?php

namespace Modules\Marketing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Marketing\Models\Campaign;

class CampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() == true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'campaign_id' => ['nullable', 'exists:campaigns,id'],
            'name' => ['required', 'string', 'min:3', 'max:250'],
            'status' => ['required', 'string', Rule::in(Campaign::$statuses)],
            'start_date' => ['required', 'string', 'date_format:Y-m-d'],
            'end_date' => ['required', 'string', 'date_format:Y-m-d', 'after_or_equal:start_date'],
            'type' => ['required', Rule::in(Campaign::$types)],
            'type_money' => ['required', Rule::in(Campaign::$type_moneies)],
            'count_email_readed' => ['required', 'numeric'],
            'budget' => ['required', 'numeric'],
            'real_cost' => ['required', 'numeric'],
            'expected_income' => ['required', 'numeric'],
            'expected_cost' => ['required', 'numeric'],
            'answer' => ['required', 'string', 'min:3', 'max:250'],
            'target' => ['required', 'string', 'min:3', 'max:250'],
            'description' => ['required', 'string', 'min:3', 'max:250'],
        ];
    }
}
