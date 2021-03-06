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
    width: 175px;
    z-index: 1;
  }
  </style>
  @foreach($Ground->buildings as $building)
    <div class="panel panel-default hoverCard " id="{{$building->id}}">
      <div class="panel-heading text-center">{{$building->name}}</div>
      <div class="panel-body text-center">
        Building has {{$building->floors->count()}} floors.
      </div>
    </div>
  @endforeach
<div class="pull-right">

    <div class="btn-group-justified paddingBottom" role="group" aria-label="...">
      <a type="button" href="/home/floorplan" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
      @if (auth::user()->admin == 1)
        <a type="button" href='/home/floorplan/{{$Ground->id}}/building' class="btn btnBorder btn-primary">Add Building</a>
      @else
        <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      @endif
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    </div>

</div>
<div class="col-md-12">
  <img id="groundImg" class=" map col-md-12" src="../../uploads/{{$Ground->filename}}" usemap="groundmap"><canvas id="clickCanvas"></canvas></img>
  <map name="groundmap">
    @foreach($Ground->buildings as $building)
      <area shape="poly" coords="{{$building->x1x}},{{$building->x1y}},{{$building->x2x}},{{$building->x2y}},{{$building->x3x}},{{$building->x3y}},{{$building->x4x}},{{$building->x4y}}" onmouseover='mouseOverArea(event,{{$building->id}});' onmouseout='mouseOutArea(event,{{$building->id}});' href="/home/floorplan/{{$Ground->id}}/{{$building->id}}" alt="{{$building->name}}">
    @endforeach
  </map>
</div>
<script src="/js/map.js"></script>
@endsection
