@extends('Landing::layouts.master')

@section('title', 'Landing')

@section('content')
    @include('Landing::parts.main')
    @include('Landing::parts.featured')
    @include('Landing::parts.editor-design')
    @include('Landing::parts.genera-informes')
    @include('Landing::parts.revolutionize')
    @include('Landing::parts.featured-two')
    @include('Landing::parts.testimonials')
    @include('Landing::parts.testimonials')
    @include('Landing::parts.pricing')
    @include('Landing::parts.call-to-action')
@endsection
