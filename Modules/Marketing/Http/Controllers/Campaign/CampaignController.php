<?php

namespace Modules\Marketing\Http\Controllers\Campaign;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Marketing\Http\Requests\CampaignRequest;
use Modules\Marketing\Services\CampaignService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Marketing\Repositories\CampaignRepo;
use Modules\Share\Repositories\ShareRepo;
use Modules\Share\Responses\AjaxResponses;

class CampaignController extends Controller
{
    public $repo;
    public $service;

    public function __construct(CampaignRepo $campaignRepo, CampaignService $campaignService)
    {
        $this->repo = $campaignRepo;
        $this->service = $campaignService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $campaigns = $this->repo->index(auth()->id())->with('user')->paginate(10);
        return view('Marketing::campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $campaigns = $this->repo->getAll(auth()->id());
        return view('Marketing::campaigns.create', compact('campaigns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CampaignRequest $request
     * @return RedirectResponse
     */
    public function store(CampaignRequest $request)
    {
        $this->service->store($request, auth()->id());
        return $this->successMessage('Your campaign was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
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
        $campaigns = $this->repo->getAllWithoutId(auth()->id(), $id);
        $editCampagin = $this->repo->findById(auth()->id(), $id);
        return view('Marketing::campaigns.edit', compact('campaigns', 'editCampagin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CampaignRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CampaignRequest $request, $id)
    {
        $editCampagin = $this->repo->findById(auth()->id(), $id);
        if ($request->campaign_id == $editCampagin->id) { // Check Campaign Selected
            ShareRepo::errorMessage(text: 'Mother Campaign Is Invalid');
            return redirect()->back();
        }
        $this->service->update($request, $id, auth()->id());
        return $this->successMessage('Your campaign was updated successfully');
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
//        return $this->successMessage('Your campaign was deleted successfully');
        return AjaxResponses::SuccessResponse();
    }

    private function successMessage($text): RedirectResponse
    {
        ShareRepo::successMessage(text: $text);
        return redirect()->route('campaigns.index');
    }
}
