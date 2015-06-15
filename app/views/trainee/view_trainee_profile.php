<h3> <?php readable_text($trainee['last_name']);?>,
     <?php readable_text($trainee['first_name']);?>

<br />
<a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/edit_trainee', array('trainee_id' => $trainee_id))) ?>">Edit</a>
