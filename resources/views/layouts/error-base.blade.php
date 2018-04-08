@extends('layouts.base')

@section('meta')
<meta name="robots" content="noindex, nofollow" />
@endsection

@push('stylesheets')
  <link href="{{ \Helpers\manifest_asset('css/app.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('body-id', 'page-top')
@section('data-spy')
  data-spy="scroll"
@endsection
@section('data-target')
  data-target=".navbar-fixed-top"
@endsection
@section('data-offset')
  data-offset="75"
@endsection

@section('content')
  @section('brand-url')
    {{ url('/') }}
  @endsection
  @includeIf('partials.header-base')
  @yield('error-section')
  @includeIf('partials.footer-base')
  @push('scripts')
    <script src="{{ asset('//maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js') }}"></script>
  @endpush
@endsection
