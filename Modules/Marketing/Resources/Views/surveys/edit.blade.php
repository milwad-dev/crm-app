@extends('Panel::layouts.master')

@section('title', 'Edit Survey')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Edit {{ $survey->name }} Survey">
            <li class="breadcrumb-item">
                <a href="{{ route('surveys.index') }}">Survey</a>
            </li>
            <li class="breadcrumb-item active">Edit Survey</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <section id="flatpickr">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="invoice-repeater" action="{{ route('surveys.update', $survey->id) }}" id="survey-form"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="name" title="Name" />
                                                <x-panel-input name="name" id="name" placeholder="Enter Name"
                                                value="{{ $survey->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="status" title="Status" />
                                                <x-panel-select name="status" id="status" defaultText="Enter Status">
                                                    @foreach (\Modules\Marketing\Models\Survey::$statuses as $status)
                                                        <option @if($survey->status == $status) selected @endif
                                                            value="{{ $status }}">{{ $status }}
                                                        </option>
                                                    @endforeach
                                                </x-panel-select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <x-panel-label for="body" title="Description (Not Required)" />
                                                <x-panel-textarea name="body" id="body" placeholder="Enter Description"
                                                value="{{ $survey->body }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <x-panel-button />
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
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
    {!! JsValidator::formRequest('Modules\Marketing\Http\Requests\SurveyRequest', '#survey-form'); !!}
@endsection


