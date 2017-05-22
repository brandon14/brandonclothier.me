@extends('base')

@section('meta')
<meta name="robots" content="noindex, nofollow" />
@endsection

@section('title', 'Brandon Clothier | 403')

@section('body')
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75">
  @includeIf('components.header-error')
  @section('error', '403 - Forbidden!')
  @includeIf('components.error')
  @includeIf('components.footer-error')
</body>
@endsection
