@extends('home.home')
@section('data')
<div class="pull-right">
  @if (auth::user()->admin == 1)
    <div class="btn-group-justified paddingBottom" role="group" aria-label="...">
      <a type="button" href='/home/floorplan/create' class="btn btnBorder btn-primary">Create Ground</a>
      <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
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
        <th>Ground</th>
        <th>Visit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($grounds as $ground)
        <tr>
          <th scope="row" class="col-md-2">{{$ground->id}}</th>
          <td class="col-md-8">{{$ground->name}}</td>
          <td class="col-md-2"><a type="button" href="/home/floorplan/{{$ground->id}}" class="btn btn-primary btn-default btnBorder btn-block"> Visit {{$ground->name}}</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
