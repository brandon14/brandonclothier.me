@extends('layouts.base')

@section('meta')
<meta name="robots" content="noindex, nofollow" />
@endsection

@section('title', 'Brandon Clothier | 405')

@section('body')
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75">
  @section('brand-url')
    {{ config('app.env') === 'production' ? url('/', true) : url('/') }}
  @endsection
  @includeIf('partials.header-base')
  @section('error', '405 - Method not allowed!')
  @includeIf('partials.error')
  @includeIf('partials.footer-base')
</body>
@endsection

@extends('layouts.error-base')

@section('title', 'Brandon Clothier | 405')

@section('error-section')
    @section('error', '405 - Method not allowed!')
    @includeIf('partials.error')
@endsection
