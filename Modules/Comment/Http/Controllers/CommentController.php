<?php

namespace Modules\Comment\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Modules\Comment\Http\Requests\CommentRequest;
use Modules\Comment\Models\Comment;
use Illuminate\Http\Request;
use Modules\Comment\Repositories\CommentRepo;
use Modules\Comment\Services\CommentService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Repositories\ShareRepo;
use Modules\Share\Responses\AjaxResponses;

class CommentController extends Controller
{
    public $repo;
    public $service;

    public function __construct(CommentRepo $commentRepo, CommentService $commentService)
    {
        $this->repo = $commentRepo;
        $this->service = $commentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $comments = $this->repo->index(auth()->id())->paginate(10);
        return view('Comment::index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentRequest $request
     * @return RedirectResponse
     */
    public function store(CommentRequest $request)
    {
        $this->service->store($request, auth()->id());
        return $this->successMessage('Comment Created Successfully');
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

    public function accept($id)
    {
        $this->repo->updateStatus(auth()->id(), $id, Comment::STATUS_APPROVED);
        return AjaxResponses::successResponse();
    }

    public function reject($id)
    {
        $this->repo->updateStatus(auth()->id(), $id, Comment::STATUS_APPROVED);
        return AjaxResponses::successResponse();
    }

    private function successMessage($text)
    {
        ShareRepo::successMessage(text: $text);
        return redirect()->route('comments.index');
    }
}
