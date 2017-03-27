<div class="col-md-2">
  <div class="btn-group-vertical .btn-group-justified" role="group" aria-label="...">
    <a type="button" href='/home/dashboard' class="btn btnBorder btn-default btn-lg">dashboard</a>
    <a type="button" href='/home/floorplan' class="btn btnBorder btn-default btn-lg">floormap</a>
    @if (auth::user()->function == 'Admin')
      <!--<a type="button" href='/home/controlpanel' class="btn btn-default btn-lg">controlpanel</a>-->
      <a type="button" href='/home/locks' class="btn btnBorder btn-default btn-lg">locks</a>
      <a type="button" href='/home/users' class="btn btnBorder btn-default btn-lg">users</a>
    @endif
  </div>
</div>
