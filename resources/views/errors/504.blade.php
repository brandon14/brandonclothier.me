@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 504')

@section('error-section')
    @section('error', '504 - Gateway timeout!')
    @includeIf('partials.error')
@endsection
