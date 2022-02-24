<?php

namespace Modules\RolePermissions\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\RolePermissions\Http\Requests\RolePermissionRequest;
use Modules\RolePermissions\Repositories\RolePermissionsRepo;
use Modules\RolePermissions\Services\RolePermissionsService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Repositories\ShareRepo;
use Modules\Share\Responses\AjaxResponses;

class RolePermissionsController extends Controller
{
    public $repo;
    public $service;

    public function __construct(RolePermissionsRepo $roleRepo, RolePermissionsService $rolePermissionService)
    {
        $this->repo = $roleRepo;
        $this->service = $rolePermissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $roles = $this->repo->index()->paginate(10);
        return view('RolePermissions::index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $permissions = $this->repo->getAllPermissions();
        return view('RolePermissions::create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RolePermissionRequest $request
     * @return RedirectResponse
     */
    public function store(RolePermissionRequest $request)
    {
        $this->service->store($request);
        return $this->successMessage('Roles Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // TODO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $role = $this->repo->findById($id);
        $permissions = $this->repo->getAllPermissions();
        return view('RolePermissions::edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(RolePermissionRequest $request, $id)
    {
        $this->service->update($request, $id);
        return $this->successMessage('Roles Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return AjaxResponses::SuccessResponse();
    }

    private function successMessage($text)
    {
        ShareRepo::successMessage(text: $text);
        return redirect()->route('role-permissions.index');
    }
}
