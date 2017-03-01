<div class="col-md-2">
  <div class="panel panel-primary ">
    <div class="panel-heading text-center">statistics</div>
  <div class="panel-body">
  <table class="table">
    <thead class="thead-inverse">
      <tr classs="text-center">
        <th>
          User Logged On
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class='text-center'>
          <?php echo e(auth::user()->name); ?>

        </td>
      </tr>
    </tbody>
  </table>
  <table class="table">
    <thead class="thead-inverse">
      <tr classs="text-center">
        <th>
          Available Locks
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class='text-center'>
          <?php echo e(auth::user()->locks->count()); ?>

        </td>
      </tr>
    </tbody>
  </table>
  </div>
  </div>
</div>
