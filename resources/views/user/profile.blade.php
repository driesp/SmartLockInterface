@extends('home.home')
@section('data')

<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/dashboard" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
    <a type="button" href="/home/profile/password" class="btn btnBorder btn-primary" >Password</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>
<div class="panel panel-primary ">
  <div class="panel-heading text-center">profile</div>
  <div class="panel-body">
    <div class="col-md-8">
      <table class="table">
        <thead class="thead-inverse">
          <tr classs="text-center">
            <th>
              Name
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=''>
              {{auth::user()->name}}
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table">
        <thead class="thead-inverse">
          <tr classs="text-center">
            <th>
              Email
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=''>
              {{auth::user()->email}}
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table">
        <thead class="thead-inverse">
          <tr classs="text-center">
            <th>
              Function
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=''>
              {{auth::user()->function}}
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table">
        <thead class="thead-inverse">
          <tr classs="text-center">
            <th>
              Department
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=''>
              {{auth::user()->department}}
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table">
        <thead class="thead-inverse">
          <tr classs="text-center">
            <th>
              Address
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=''>
              {{auth::user()->address}}
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table">
        <thead class="thead-inverse">
          <tr classs="text-center">
            <th>
              Telephone
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class=''>
              {{auth::user()->telephone}}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-4 row text-center">
      <img class="" src="{{ Gravatar::src(auth::user()->email, 225) }}" width='225'>
    </div>
  </div>
</div>
@endsection
