<?php

namespace Modules\Marketing\Http\Controllers\Survey;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Marketing\Repositories\SurveyRepo;
use Modules\Marketing\Services\SurveyService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Repositories\ShareRepo;
use Modules\Share\Responses\AjaxResponses;

class SurveyController extends Controller
{
    public $repo;
    public $service;

    public function __construct(SurveyRepo $surveyRepo, SurveyService $surveyService)
    {
        $this->repo = $surveyRepo;
        $this->service = $surveyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $surveys = $this->repo->index(auth()->id())->paginate(10);
        return view('Marketing::surveys.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('Marketing::surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->service->store($request, auth()->id());
        return $this->successMessage('Survey Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        // TODO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $survey = $this->repo->findById(auth()->id(), $id);
        return view('Marketing::surveys.edit', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->service->update($request, $id, auth()->id());
        return $this->successMessage('Survey Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->repo->delete(auth()->id(), $id);
        return AjaxResponses::SuccessResponse();
    }

    private function successMessage($text)
    {
        ShareRepo::successMessage(text: $text);
        return redirect()->route('surveys.index');
    }
}
