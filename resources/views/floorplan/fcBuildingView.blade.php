@extends('home.home')
@section('data')
<div class="pull-right">
  @if (auth::user()->function == 'Admin')
    <div class="btn-group-justified paddingBottom" role="group" aria-label="...">
      <a type="button" href="/home/floorplan/{{$Ground->id}}" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
      @if (auth::user()->function == 'Admin')
        <a type="button" href='/home/floorplan/{{$Ground->id}}/{{$Building->id}}/createfloor' class="btn btn-primary btnBorder">Create Floor</a>
      @else
        <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      @endif
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    </div>
  @endif
</div>
<div class="">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Floor</th>
        <th>Visit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($Floors as $Floor)
        <tr>
          <th scope="row" class="col-md-2">{{$Floor->id}}</th>
          <td class="col-md-8">{{$Floor->name}}</td>
          <td class="col-md-2"><a type="button" href="/home/floorplan/{{$Ground->id}}/{{$Building->id}}/{{$Floor->id}}" class="btn btn-primary btn-default btn-block"> Visit {{$Floor->name}}</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
