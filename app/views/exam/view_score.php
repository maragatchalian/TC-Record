<h3> <?php readable_text($trainee->first_name)?> <?php readable_text($trainee->last_name)?></h3>
<br />
<h5> Essential Course </h5>
<br />

//TODO: View Exam Scores
<a class="btn btn-medium btn-default" href="<?php readable_text(url('exam/add_score', array('trainee_id' => $trainee_id))) ?>">Add</a>