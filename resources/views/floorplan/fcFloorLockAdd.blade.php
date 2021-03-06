@extends('home.home')
@section('data')
  <style>
  img
  {
      width: 690px;
  }
  </style>
<div class="btn-group-justified paddingBottom" role="group" aria-label="...">
  <a type="button" href="/home/floorplan/{{$Ground->id}}/{{$Building->id}}/{{$Floor->id}}" class="btn btnBorder btn-primary" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Return</a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
  <a type="button" href="" class="btn btnBorder btn-default disabled" ></a>
</div>
<div class="panel panel-primary">
    <div class="panel-heading text-center">Create Lock</div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/home/floorplan/{{$Ground->id}}/{{$Building->id}}/{{$Floor->id}}/insertlock" enctype="multipart/form-data">
        {{ csrf_field() }}

        <fieldset>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Name</label>
            <div class="col-md-4">
              <select id="selectbasic" name="id" class="form-control">
                @foreach($Locks as $lock)
                  <option value="{{$lock->id}}">{{$lock->room}} ({{$lock->address}})</option>
                @endforeach
              </select>

            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X1</label>
            <div class="col-md-2">
            <input id="x1x" name="x1x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x1y" name="x1y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X2</label>
            <div class="col-md-2">
            <input id="x2x" name="x2x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x2y" name="x2y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X3</label>
            <div class="col-md-2">
            <input id="x3x" name="x3x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x3y" name="x3y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">X4</label>
            <div class="col-md-2">
            <input id="x4x" name="x4x" value='' type="text" placeholder="x" class="form-control input-md" readonly>
            </div>
            <div class="col-md-2">
            <input id="x4y" name="x4y" value='' type="text" placeholder="y" class="form-control input-md" readonly>
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
<div class="col-md-12">
  <img class="col-md-12" src="/uploads/floors/{{$Floor->filename}}"/>
</div>


<script>
$(document).ready(function() {
  console.log('bar');
  var i = 1;
  $('img').click(function(e) {
    var offset = $(this).offset();

    switch (i) {
      case 1: $('#x1x').val(e.pageX - offset.left); $('#x1y').val(e.pageY - offset.top); console.log('1'); break;
      case 2: $('#x2x').val(e.pageX - offset.left); $('#x2y').val(e.pageY - offset.top); console.log('2'); break;
      case 3: $('#x3x').val(e.pageX - offset.left); $('#x3y ').val(e.pageY - offset.top); console.log('3'); break;
      case 4: $('#x4x').val(e.pageX - offset.left); $('#x4y').val(e.pageY - offset.top); console.log('4'); break;
      default: alert('Markers allready placed');break;
    }
    i++;
  });
});
</script>
@endsection
