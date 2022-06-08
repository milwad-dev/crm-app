@extends('Panel::layouts.master')

@section('title', 'Manage Comments')
{{-- TODO DATATABLE --}}
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Manage Comments">
            <li class="breadcrumb-item">
                <a href="{{ route('comments.index') }}">Comment</a>
            </li>
            <li class="breadcrumb-item active">Manage Comments</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Comments</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>User</th>
                                        <th>For</th>
                                        <th>Body</th>
                                        <th>Status</th>
                                        <th>Reply Count</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->user->name }}</td>
                                            <td>
                                                <span class="badge badge-light-primary me-1">
                                                    {{ $comment->showCommentable() }} {{-- TODO For Link PATH() --}}
                                                </span>
                                            </td>
                                            <td>{{ Str::limit($comment->body, 150) }}</td>{{-- TODO FOR SHOW MODAL DETAIL --}}
                                            <td class="status">
                                                <span class="badge rounded-pill badge-light-{{ $comment->statusCss() }} me-1">
                                                    {{ $comment->status }}
                                                </span>
                                            </td>
                                            <td>{{ $comment->comments->count() }}</td>
                                            <td>{{ $comment->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a onclick="deleteItem(event, '{{ route('comments.destroy'
                                                            , $comment->id) }}')">
                                                            <i data-feather="delete"></i>
                                                        </a>
                                                        <a onclick="updateStatus(event, '{{ route('comments.accept',
                                                            $comment->id) }}', 'approved')">
                                                            <i data-feather='check'></i>
                                                        </a>
                                                        <a onclick="updateStatus(event, '{{ route('comments.reject',
                                                            $comment->id) }}', 'rejected')">
                                                            <i data-feather='power'></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
