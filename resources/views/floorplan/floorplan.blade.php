@extends('home.home')
@section('data')
<div class="pull-right">
  @if (auth::user()->function == 'Admin')
    <div class="btn-group" role="group" aria-label="...">
      <a type="button" href='/home/floorplan/create' class="btn btn-default btn-lg">Create Floorplan</a>
    </div>
  @endif
</div>
<div class="">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Ground</th>
        <th>Visit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($grounds as $ground)
        <tr>
          <th scope="row" class="col-md-2">{{$ground->id}}</th>
          <td class="col-md-8">{{$ground->name}}</td>
          <td class="col-md-2"><a type="button" href="/home/floorplan/{{$ground->id}}" class="btn btn-primary btn-default btn-block"> Visit {{$ground->name}}</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
