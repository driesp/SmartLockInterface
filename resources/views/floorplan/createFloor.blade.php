@extends('home.home')
@section('data')
<div class="panel panel-default">
    <div class="panel-heading text-center">Create Grounds</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/home/floorplan/{{$Ground->id}}/{{$Building->id}}/insertfloor" enctype="multipart/form-data">
        {{ csrf_field() }}

        <fieldset>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Name</label>
            <div class="col-md-4">
            <input id="name" name="name" value='{{old('name')}}' type="text" placeholder="name" class="form-control input-md" >

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="file">Image</label>
            <div class="col-md-6">
            <input id="file" name="file" type="file" placeholder="image" value='{{old('file')}}' class="form-control input-md">

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
      @if (count($errors))
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
</div>
@endsection
