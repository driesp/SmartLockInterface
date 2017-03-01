@extends('home.home')
@section('data')

  <div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/user/create" class="btn btnBorder btn-primary" > <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add User</a>
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
  @endsection
