@extends('home.home')
@section('data')

<div class="panel panel-default">
    <div class="panel-heading">{{$Lock->room}}</div>
    <div class="panel-body">
      <form method="post" class =" col-md-8 col-md-offset-2"action="">
        <ul class="list-unstyled">
          <li>
            <div class="input-group">
              <span class="input-group-addon">room</span>
              <input type="text" name="room" class="form-control" placeholder="room" value="{{$Lock->room}}" aria-describedby="basic-addon1">
            </div>
          </li>
          <li>
            <div class="input-group">
              <span class="input-group-addon">password</span>
              <input type="text" name="password" class="form-control" placeholder="password" value="{{$Lock->password}}" aria-describedby="basic-addon1">
            </div>
          </li>
          <li>
            <div class="input-group">
              <span class="input-group-addon">address</span>
              <input type="text" name="address" class="form-control" placeholder="address" value="{{$Lock->address}}" aria-describedby="basic-addon1">
            </div>
          </li>
        </ul>
      </form>
    </div>
</div>
@endsection
