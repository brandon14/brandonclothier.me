@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 408')

@section('error-section')
    @section('error', '408 - Request timeout!')
    @includeIf('partials.error')
@endsection
