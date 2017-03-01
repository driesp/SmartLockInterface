@extends('home.home')
@section('data')



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
