@extends('Panel::layouts.master')

@section('title', 'Create Factory')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <x-panel-breadcrumb title="Create New Factory">
            <li class="breadcrumb-item">
                <a href="{{ route('factories.index') }}">Factory</a>
            </li>
            <li class="breadcrumb-item active">Create Factory</li>
        </x-panel-breadcrumb>
        <div class="content-body">
            <section id="flatpickr">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form form-vertical" action="{{ route('factories.store') }}" id="factory-form"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="count" title="Count (20)" />
                                                <x-panel-input type="number" name="count" id="count" placeholder="Enter Count"
                                                value="{{ old('count') }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-1">
                                                <x-panel-label for="model" title="Module" />
                                                <x-panel-select name="model" id="model" defaultText="Select The Module">
                                                    @foreach (\Modules\Factory\Models\Factory::$models as $model)
                                                        <option value="{{ $model }}">{{ $model }}</option>
                                                    @endforeach
                                                </x-panel-select>
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
    {!! JsValidator::formRequest('Modules\Factory\Http\Requests\FactoryRequest', '#factory-form'); !!}
@endsection
