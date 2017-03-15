@extends('home.home')
@section('data')

<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
    <a type="button" href="/home/profile" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
    <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>
<div class="panel panel-primary ">
  <div class="panel-heading text-center">Change Password</div>
  <div class="panel-body">
    <form class="form-horizontal" method="POST" action="/home/profile/password/update")>
      {{ csrf_field() }}
      <fieldset>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Room">Password</label>
          <div class="col-md-4">
          <input id="password" name="password" type="password" placeholder="password" value="" class="form-control input-md" required="">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password-confirm">Password Confirm</label>
          <div class="col-md-4">
          <input id="password-confirm" name="password_confirmation" type="password" placeholder="confirm password"  value="" class="form-control input-md" required="">
          </div>
        </div>
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-4">
            <button id="Submit" name="Submit" class="btn btn-primary">Change Password</button>
          </div>
        </div>

      </fieldset>
    </form>
  </div>
</div>
@endsection
