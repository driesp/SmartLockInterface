@extends('home.home')
@section('data')

<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/profile" class="btn btnBorder btn-primary" >Profile</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>

<div class="">
  <table class="table">
    <thead class="thead-inverse">
      <tr>
        <th></th>
        <th>#</th>
        <th>Room</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      @foreach(Auth::user()->locks as $lock)
        <tr>
          <td><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></td>
          <th scope="row">{{$lock->id}}</th>
          <td>{{$lock->room}}</td>
          <td>{{$lock->address}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
