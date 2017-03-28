@extends('home.home')
@section('data')

<style>
img
{
    width: 690px;
}
div.hoverCard
{
  display: none;
  position: absolute;
  width: 225px;
  z-index: 1;
}
</style>
@foreach($Floor->Locks as $lock)
  <div class="panel panel-default hoverCard @if($lock->active == true) panel-success @else panel-danger @endif" id="{{$lock->id}}">
    <div class="panel-heading text-center">{{$lock->room}}</div>
    <div class="panel-body text-center">
      Address: {{$lock->address}}</br>
    </div>
  </div>
@endforeach
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
  <a type="button" href="/home/floorplan/{{$Ground->id}}/{{$Building->id}}" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
  @if (auth::user()->admin == 1)
    <a type="button" href='/home/floorplan/{{$Ground->id}}/{{$Building->id}}/{{$Floor->id}}/edit' class="btn btn-primary btnBorder">Edit</a>
    <a type="button" href='/home/floorplan/{{$Ground->id}}/{{$Building->id}}/{{$Floor->id}}/addlock' class="btn btn-primary btnBorder">Add Lock</a>
  @else
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  @endif
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>

<div class="col-md-12">

  <img class="col-md-12" src="../../../../uploads/floors/{{$Floor->filename}}" usemap="floormap"><canvas id="clickCanvas"></canvas></img>
  <map name="floormap">
    @foreach($Floor->Locks as $lock)
      <area shape="poly" coords="{{$lock->x1x}},{{$lock->x1y}},{{$lock->x2x}},{{$lock->x2y}},{{$lock->x3x}},{{$lock->x3y}},{{$lock->x4x}},{{$lock->x4y}}" onmouseover='mouseOverArea(event,{{$lock->id}});' onmouseout='mouseOutArea(event,{{$lock->id}});'alt="{{$lock->room}}">
    @endforeach
  </map>
</div>

<script src="/js/map.js"></script>

@endsection
