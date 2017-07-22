@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 401')

@section('error-section')
    @section('error', '401 - Unauthorized!')
    @includeIf('partials.error')
@endsection
