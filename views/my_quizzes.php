<?php include('views/header.php'); ?>

<h2>Your Quizzies</h2>

<table id="fullTable" class="center">
  <tr class="header">
      <th>Name</th>
      <th>Topic</th>
      <th>Delete?</th>
  </tr> 

  <?php foreach ($my_quizzes as $q):?>
  <tr>
  <td><?php echo $q{'name'} ?></td>
  <td><?php echo $q{'topic'} ?></td>
  <td>
    <form action='.' method='POST'>
      <input type="hidden" name="action" value="delete_quiz">
      <input type="hidden" name="gameID" value="<?php echo $q{'GID'} ?>">
      <button onclick="return confirm('Are you sure you want to delete?');" type="submit" class="btn btn-large btn-danger">Delete</button>
    </form>
  </td>
  </tr>
  <?php endforeach; ?>

</table>

<?php include('views/footer.php'); ?>
