@extends('Panel::layouts.master')

@section('title', 'Manage Surveys')
{{-- TODO DATATABLE --}}
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Manage Surveys" buttonTitle="Create Survey" buttonRoute="{{ route('surveys.create') }}">
            <li class="breadcrumb-item">
                <a href="{{ route('surveys.index') }}">Survey</a>
            </li>
            <li class="breadcrumb-item active">Manage Surveys</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Surveys</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>User</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surveys as $survey)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $survey->name }}</td>
                                            <td>
                                                <span class="badge rounded-pill badge-light-{{ $survey->statusCss() }} me-1">
                                                    {{ $survey->status }}
                                                </span>
                                            </td>
                                            <td>{{ $survey->user->name }}</td>
                                            <td>{{ $survey->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a onclick="deleteItem(event, '{{ route('surveys.destroy'
                                                            , $survey->id) }}')">
                                                            <i data-feather="delete"></i>
                                                        </a>
                                                        <a href="{{ route('surveys.edit', $survey->id) }}">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $surveys->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
