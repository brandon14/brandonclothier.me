@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 404')

@section('error-section')
    @section('error', '404 - Page not found!')
    @includeIf('partials.error')
@endsection
