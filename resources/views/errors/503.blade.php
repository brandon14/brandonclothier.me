@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 503')

@section('error-section')
    @section('error', '503 - Service unavailable!')
    @includeIf('partials.error')
@endsection
