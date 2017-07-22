@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 500')

@section('error-section')
    @section('error', '500 - Internal server error!')
    @includeIf('partials.error')
@endsection
