@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 502')

@section('error-section')
    @section('error', '502 - Bad gateway!')
    @includeIf('partials.error')
@endsection
