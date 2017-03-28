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
  <a type="button" href="/home/floorplan/{{$Ground->id}}/{{$Building->id}}/{{$Floor->id}}" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>

<div class="col-md-12">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>room</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
@foreach($Floor->Locks as $lock)
  <tr>
    <th scope="row" class="col-md-2">{{$lock->id}}</th>
    <td class="col-md-8">{{$lock->room}}</td>
    <td class="col-md-2"><a type="button" href="/home/floorplan/{{$Ground->id}}/{{$Building->id}}/{{$Floor->id}}/{{$lock->id}}/delete" class="btn btn-danger btn-default btn-block"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
  </tr>
@endforeach
    </tbody>
  </table>
</div>

@endsection
