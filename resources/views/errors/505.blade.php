@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 505')

@section('error-section')
    @section('error', '505 - HTTP version not supported!')
    @includeIf('partials.error')
@endsection
