@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @include('sidemenu')
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">My locks</div>

                <div class="panel-body">
                    Here will all your locks be displayed
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
