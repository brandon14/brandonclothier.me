@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 403')

@section('error-section')
    @section('error', '403 - Forbidden!')
    @includeIf('partials.error')
@endsection
