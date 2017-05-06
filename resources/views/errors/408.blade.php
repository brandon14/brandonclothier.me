@extends('main')

@section('meta')
<meta name="robots" content="noindex, nofollow" />
@endsection

@section('title', 'Brandon Clothier | 408')

@section('body')
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75" itemscope itemtype="http://schema.org/Person">
  @includeIf('components.header-error')
  @section('error', '408 - Request timeout!')
  @includeIf('components.error')
  @includeIf('components.footer-error')
</body>
@endsection