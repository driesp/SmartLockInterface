<div class="col-md-2">
  <div class="btn-group-vertical .btn-group-justified" role="group" aria-label="...">
    <a type="button" href='/home/dashboard' class="btn btn-default btn-lg">dashboard</a>
    <?php if(auth::user()->function == 'Admin'): ?>
      <a type="button" href='/home/controlpanel' class="btn btn-default btn-lg">controlpanel</a>
      <a type="button" href='/home/locks' class="btn btn-default btn-lg">locks</a>
      <a type="button" href='/home/users' class="btn btn-default btn-lg">users</a>
    <?php endif; ?>
  </div>
</div>
