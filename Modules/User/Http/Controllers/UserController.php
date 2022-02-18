<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Repositories\ShareRepo;
use Modules\Share\Responses\AjaxResponses;
use Modules\User\Http\Requests\UserRequest;
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
     */
    public function index()
    {
        $users = $this->repo->index(auth()->id())->paginate(10);
        return view('User::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('User::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
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
     */
    public function edit($id)
    {
        $user = $this->repo->findById(id: $id);
        return view('User::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $this->service->update($request, $id);
        return $this->successMessage('User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->repo->delete(id: $id);
        return AjaxResponses::SuccessResponse();
    }

//    public function changeStatusEmailVerified($id)
//    {
//        $this->repo->changeStatusEmailVerified($id);
//        return AjaxResponses::SuccessResponse();
//    }

    private function successMessage($text)
    {
        ShareRepo::successMessage(text: $text);
        return redirect()->route('users.index');
    }
}
