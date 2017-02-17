@extends('home.home')
@section('data')
  <div class="panel panel-default">
      <div class="panel-heading text-align-center">Locks</div>

      <div class="panel-body">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th>#</th>
              <th>Room</th>
              <th>Password</th>
              <th>Address</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <a type="button" href="/home/lock/create" class="pull-right btn btn-primary btn-primary"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add Lock</a>
            </tr>
            @foreach ($locks as $lock)
              <tr>
                <th scope="row">{{$lock->id}}</th>
                <td>{{$lock->room}}</td>
                <td type='password'>{{$lock->password}}</td>
                <td>{{$lock->address}}</td>
                <td><a type="button" href="/home/lock/{{$lock->id}}/edit" class="btn btn-primary btn-success"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                <td><a type="button" href="/home/lock/{{$lock->id}}/delete" class="btn btn-primary btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
  @endsection
