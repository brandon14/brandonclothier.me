@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 400')

@section('error-section')
    @section('error', '400 - Bad request!')
    @includeIf('partials.error')
@endsection
