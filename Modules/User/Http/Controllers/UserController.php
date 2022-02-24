<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\RolePermissions\Repositories\RolePermissionsRepo;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Repositories\ShareRepo;
use Modules\Share\Responses\AjaxResponses;
use Modules\User\Http\Requests\AddRoleRequest;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Models\User;
use Modules\User\Repositories\UserRepo;
use Modules\User\Services\UserService;

class UserController extends Controller
{
    public $repo;
    public $service;

    public function __construct(UserRepo $userRepo, UserService $userService)
    {
        $this->repo = $userRepo;
        $this->service = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index(RolePermissionsRepo $rolePermissionsRepo)
    {
        $this->authorize('manage', User::class);
        $users = $this->repo->index(auth()->id())->paginate(10);
        $roles = $rolePermissionsRepo->getAllRoles();
        return view('User::index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('manage', User::class);
        return view('User::create', compact());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(UserRequest $request)
    {
        $this->authorize('manage', User::class);
        $this->service->store($request);
        return $this->successMessage('User Created Successfully');
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
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('manage', User::class);
        $user = $this->repo->findById(id: $id);
        return view('User::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UserRequest $request, $id)
    {
        $this->authorize('manage', User::class);
        $this->service->update($request, $id);
        return $this->successMessage('User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('manage', User::class);
        $this->repo->delete(id: $id);
        return AjaxResponses::SuccessResponse();
    }

    public function addRole(AddRoleRequest $request, User $user)
    {
        $this->authorize('manage', User::class);
        $user->assignRole($request->role);
        return $this->successMessage('Assign Role Successfully');
    }

    public function removeRole($userId, $role)
    {
        $this->authorize('manage', User::class);
        $user = $this->repo->findById(id: $userId);
        $user->removeRole($role);
        return AjaxResponses::SuccessResponse();
    }

    private function successMessage($text)
    {
        ShareRepo::successMessage(text: $text);
        return redirect()->route('users.index');
    }

//    public function changeStatusEmailVerified($id)
//    {
//        $this->repo->changeStatusEmailVerified($id);
//        return AjaxResponses::SuccessResponse();
//    }
}
