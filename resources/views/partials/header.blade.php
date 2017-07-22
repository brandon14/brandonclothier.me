@extends('partials.header-base')

@section('collapse-button')
  <!-- Navbar collapse button -->
  <button type="button"
          class="navbar-toggle"
          data-toggle="collapse"
          data-target=".navbar-collapse"
          aria-expanded="false"
          aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <!-- End navbar collapse button -->
@endsection

@section('navbar-items')
  <!-- Navbar items -->
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
      <li><a class="page-scroll" href="#about">About</a></li>
      <li><a class="page-scroll" href="#resume">Resume</a></li>
      <li><a class="page-scroll" href="#contact">Contact</a></li>
    </ul>
  </div>
  <!-- End navbar items -->
@endsection
