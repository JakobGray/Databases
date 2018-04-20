<?php include('views/header.php'); ?>

<h2>TF Questions</h2>

<div class="form-group has-feedback has-feedback-left">
  <input type="text" id="fullInput" class="form-control" onkeyup="searchTable()" placeholder="Search by name.." title="Type in a name" />
  <i class="form-control-feedback glyphicon glyicon-search">
</div>

<table id="fullTable"  style="width: 80%; margin-left: 10%" border=1>
  <th style="text-align: center">Name</th><th style="text-align: center">Topic</th><th style="text-align: center">Play</th>
  <?php foreach ($questions as $q):?>

  <tr>
  <td style="text-align: center"><?php echo $q{'name'} ?></td>
  <td style="text-align: center"><?php echo $q{'topic'} ?></td>
  <td style="text-align: center">
    <form action='.' method='POST'>
      <input type="hidden" name="action" value="take_tf_quiz">
      <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
      <button type="submit" style="width: 70%" class="btn btn-large btn-primary">Play</button>
    </form>
  </td>
  </tr>

  <?php endforeach; ?>
</table>


<script>
function searchTable() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("fullInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("fullTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<?php include('views/footer.php'); ?>
