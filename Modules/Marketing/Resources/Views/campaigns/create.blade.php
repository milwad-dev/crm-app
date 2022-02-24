@extends('Panel::layouts.master')

@section('title', 'Create Campaign')

@section('css')
    {{-- Load Css Date Picker File --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/plugins/forms/pickers/form-pickadate.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Create New Campaign">
            <li class="breadcrumb-item">
                <a href="{{ route('campaigns.index') }}">Campaign</a>
            </li>
            <li class="breadcrumb-item active">Create Campaign</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <section id="flatpickr">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('campaigns.store') }}" id="campaign-form"
                                      method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="name" title="Name" />
                                                <x-panel-input name="name" id="name" placeholder="Enter Name"
                                                value="{{ old('name') }}" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="count_email_readed" title="Count Email Readed" />
                                                <x-panel-input type="number" name="count_email_readed" id="count_email_readed"
                                                 placeholder="Enter Count Email Readed" value="{{ old('count_email_readed') }}" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="budget" title="Budget" />
                                                <x-panel-input type="number" name="budget" id="budget" placeholder="Enter Budget"
                                                value="{{ old('budget') }}" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="real_cost" title="Real Cost" />
                                                <x-panel-input type="number" name="real_cost" id="real_cost"
                                                placeholder="Enter Real Cost" value="{{ old('real_cost') }}" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="expected_income" title="Expected Income" />
                                                <x-panel-input type="number" name="expected_income" id="expected_income"
                                                placeholder="Enter Expected Income" value="{{ old('expected_income') }}" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="expected_cost" title="Expected Cost" />
                                                <x-panel-input type="number" name="expected_cost" id="expected_cost"
                                                placeholder="Enter Expected Cost" value="{{ old('expected_cost') }}" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="start_date" title="Start Date" />
                                                <x-panel-input class="form-control flatpickr-basic flatpickr-input active"
                                                name="start_date" id="start_date" placeholder="Enter Start Date" readonly="readonly" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="end_date" title="End Date" />
                                                <x-panel-input class="form-control flatpickr-basic flatpickr-input active"
                                                name="end_date" id="end_date" placeholder="Enter End Date" readonly="readonly" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-1">
                                                <x-panel-label for="target" title="Target" />
                                                <x-panel-input name="target" id="target" placeholder="Enter Target"
                                                value="{{ old('target') }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="status" title="Status" />
                                                <x-panel-select id="status" name="status" defaultText="Select Your Status">
                                                    @foreach (\Modules\Marketing\Models\Campaign::$statuses as $status)
                                                        <option value="{{ $status }}">{{ $status }}</option>
                                                    @endforeach {{-- TODO old for select --}}
                                                </x-panel-select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="type" title="Type" />
                                                <x-panel-select id="type" name="type" defaultText="Select Your Type">
                                                    @foreach (\Modules\Marketing\Models\Campaign::$types as $type)
                                                        <option value="{{ $type }}">{{ $type }}</option>
                                                    @endforeach
                                                </x-panel-select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="type_money" title="Type Money" />
                                                <x-panel-select id="type_money" name="type_money" defaultText="Select Your Type Money">
                                                    @foreach (\Modules\Marketing\Models\Campaign::$type_moneies as $type_money)
                                                        <option value="{{ $type_money }}">{{ $type_money }}</option>
                                                    @endforeach
                                                </x-panel-select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="answer" title="Answer" />
                                                <x-panel-select id="answer" name="answer" defaultText="Select Your Answer">
                                                    @foreach (\Modules\Marketing\Models\Campaign::$answers as $answer)
                                                        <option value="{{ $answer }}">{{ $answer }}</option>
                                                    @endforeach
                                                </x-panel-select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="campaign_id" title="Mother Campaign (No Required)" />
                                                <x-panel-select id="campaign_id" name="campaign_id" defaultText="Select Your Mother Campaign">
                                                    @foreach ($campaigns as $campaign)
                                                        <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                                                    @endforeach
                                                </x-panel-select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="description" title="Description" />
                                                <x-panel-textarea name="description" id="description" placeholder="Enter Description"
                                                value="{{ old('description') }}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <x-panel-button />
                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('Modules\Marketing\Http\Requests\CampaignRequest', '#campaign-form'); !!}

    {{-- Load Date Picker --}}
{{--    <script src="{{ asset('panel/vendors/js/vendors.min.js') }}"></script>--}}
    <script src="{{ asset('panel/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('panel/js/scripts/forms/pickers/form-pickers.min.js') }}"></script>
@endsection


