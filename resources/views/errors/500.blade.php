@extends('main')

@section('meta')
<meta name="robots" content="noindex, nofollow" />
@endsection

@section('title', 'Brandon Clothier | 500')

@section('body')
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75" itemscope itemtype="http://schema.org/Person">
  @includeIf('components.header-error')
  @section('error', '500 - Internal server error!')
  @includeIf('components.error')
  @includeIf('components.footer-error')
</body>
@endsection