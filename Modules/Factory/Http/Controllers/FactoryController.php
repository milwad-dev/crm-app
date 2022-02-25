<?php

namespace Modules\Factory\Http\Controllers;

use Modules\Comment\Models\Comment;
use Modules\Factory\Http\Requests\FactoryRequest;
use Modules\Factory\Models\Factory;
use Modules\Marketing\Models\Campaign;
use Modules\Marketing\Models\Survey;
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
        $this->storeByModel($request);
        ShareRepo::successMessage(text: "$request->model Created Successfully");
        return redirect()->route('factories.index');
    }

    private function storeByModel($request)
    {
        $count = $request->count;
        switch($request->model) {
            case Factory::MODEL_USER:
                $this->factory(User::class, $count);
                break;
            case Factory::MODEL_CAMPAIGN:
                $this->factory(Campaign::class, $count);
                break;
            case Factory::MODEL_SURVEY:
                $this->factory(Survey::class, $count);
                break;
            case Factory::MODEL_COMMENT:
                $this->factory(Comment::class, $count);
                break;
            default:
                ShareRepo::errorMessage("$request->model Not Found");
                return redirect()->back();
        }
    }

    private function factory($model, $count)
    {
        return $model::factory($count)->create();
    }
}
