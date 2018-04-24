<?php include('views/header.php'); ?>

<h2>Full Question Listing</h2>

<input type="text" id="fullInput" onkeyup="searchTable()" placeholder="Search by name.." title="Type in a name" />


<table id="fullTable" class="center">
  <tr class="header">
      <th>Name</th>
      <th>Topic</th>
      <th>Play</th>
  </tr>

  <?php foreach ($questions as $q):?>
  <tr>
  <td><?php echo $q{'name'} ?></td>
  <td><?php echo $q{'topic'} ?></td>
  <td>
    <form action='.' method='POST'>
      <input type="hidden" name="action" value="<?php echo $post_val ?>">
      <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
      <button type="submit" class="btn btn-xs btn-primary" style="margin: 5px">Play</button>
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
