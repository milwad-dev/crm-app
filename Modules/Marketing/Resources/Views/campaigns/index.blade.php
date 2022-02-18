@extends('Panel::layouts.master')

@section('title', 'Manage Campaigns')
{{-- TODO DATATABLE --}}
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Manage Campaigns" buttonTitle="Create Campaign" buttonRoute="{{ route('campaigns.create') }}">
            <li class="breadcrumb-item">
                <a href="{{ route('campaigns.index') }}">Campaign</a>
            </li>
            <li class="breadcrumb-item active">Manage Campaigns</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Campaigns</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Mother Campaign</th>
                                        <th>User</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campaigns as $campaign)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $campaign->name }}</td>
                                            <td>
                                                <span class="badge rounded-pill badge-light-{{ $campaign->statusCss() }} me-1">
                                                    {{ $campaign->status }}
                                                </span>
                                            </td>
                                            <td><span class="badge badge-light-primary me-1">{{ $campaign->type }}</span></td>
                                            <td>{{ $campaign->start_date }}</td>
                                            <td>{{ $campaign->end_date }}</td>
                                            <td>{{ $campaign->parent }}</td>
                                            <td>{{ $campaign->user->name }}</td>
                                            <td>{{ $campaign->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <a onclick="deleteItem(event, '{{ route('campaigns.destroy'
                                                            , $campaign->id) }}')">
                                                            <i data-feather="delete"></i>
                                                        </a>
                                                        <a href="{{ route('campaigns.edit', $campaign->id) }}">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
