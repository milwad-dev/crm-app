<?php

namespace Modules\Factory\Http\Controllers;

use Modules\Factory\Http\Requests\FactoryRequest;
use Modules\Factory\Models\Factory;
use Modules\Marketing\Models\Campaign;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Repositories\ShareRepo;
use Modules\User\Models\User;

class FactoryController extends Controller
{
    public function create()
    {
        return view('Factory::create');
    }

    public function store(FactoryRequest $request)
    {
        switch($request->model) {
            case Factory::MODEL_USER:
                User::factory($request->count)->create();
                break;
            case Factory::MODEL_CAMPAIGN:
                Campaign::factory($request->count)->create();
                break;
            default:
                ShareRepo::errorMessage("$request->model Not Found");
                return redirect()->back();
        }
        ShareRepo::successMessage(text: "$request->model Created Successfully");
        return redirect()->route('factories.index');
    }
}
