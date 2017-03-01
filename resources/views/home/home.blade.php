@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @include('home.sidemenu')
        <div class="col-md-8">
          @yield('data')
        </div>
      @include('home.statistics')
    </div>
</div>
@endsection
