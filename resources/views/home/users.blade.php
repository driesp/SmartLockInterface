@extends('home.home')
@section('data')
  <div class="panel panel-default">
      <div class="panel-heading text-align-center">Users</div>

      <div class="panel-body">
        <table class="table">
          <thead class="thead-inverse">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Function</th>
              <th>Department</th>
              <th>Email</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <a type="button" href="/home/user/create" class="pull-right btn btn-primary btn-primary"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add User</a>
            </tr>
            @foreach ($users as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->function}}</td>
                <td>{{$user->department}}</td>
                <td>{{$user->email}}</td>
                <td><a type="button" href="/home/user/{{$user->id}}/edit" class="btn btn-primary btn-success"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                <td><a type="button" href="/home/user/{{$user->id}}/delete" class="btn btn-primary btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
  @endsection
