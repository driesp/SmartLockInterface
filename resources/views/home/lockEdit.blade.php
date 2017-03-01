@extends('home.home')
@section('data')
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/locks" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>
<div class="panel panel-default">
    <div class="panel-heading text-center">Edit Lock</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/home/lock/{{$Lock->id}}")>
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <fieldset>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Room">Room</label>
            <div class="col-md-4">
            <input id="Room" name="room" type="text" placeholder="room" value="{{$Lock->room}}" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Password">Password</label>
            <div class="col-md-4">
            <input id="Password" name="password" type="text" placeholder="password" value="{{$Lock->password}}" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Device Address">Address</label>
            <div class="col-md-4">
            <input id="Device Address" name="address" type="text" value="{{$Lock->address}}" placeholder="address" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="Submit"></label>
            <div class="col-md-4">
              <button id="Submit" name="Submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

        </fieldset>
      </form>
    </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading text-center">Add User</div>
  <div class="panel-body">
    <form class="form-horizontal" method="POST" action="/home/lock/{{$Lock->id}}/connect">
      {{ csrf_field() }}
      <fieldset>
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Select User</label>
        <div class="col-md-6">
          <select id="selectbasic" name="user" class="form-control">
            @foreach($users as $user)
              <option value="{{$user->id}}">{{$user->name}} ({{$user->email}})</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add</button>
        </div>
      </div>

      </fieldset>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading text-center">Users</div>
  <div class="panel-body">
    <table class="table">
      <thead class="thead-inverse">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($Lock->users as $userL)
          <tr>
            <th scope="row">{{$userL->id}}</th>
            <td>{{$userL->name}}</td>
            <td>{{$userL->email}}</td>
            <td><a type="button" href="/home/lock/{{$Lock->id}}/{{$userL->id}}/delete" class="btn btn-primary btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
@endsection
