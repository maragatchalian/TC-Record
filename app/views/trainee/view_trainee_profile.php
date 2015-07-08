<h3> <?php readable_text($trainee['last_name']);?>,
     <?php readable_text($trainee['first_name']);?> </h3>

<div class="avatar-big float-left">
<img src='' width="200" height="200" align="left" class="img-rounded" />
</div>

<br />
<div class="float-right user-details">
<b>Last Name: </b>  <?php readable_text($trainee['last_name']);?> <br />
<b>First Name: </b>  <?php readable_text($trainee['first_name']);?> <br />
<b>Batch : </b>  <?php readable_text($trainee['batch']);?> <br />
<b>Primary Skill : </b>  <?php readable_text($trainee['skill_set']);?> <br />
<b>Training Status : </b><?php readable_text($trainee['training_status']);?> <br />
<b>Course Status : </b><?php readable_text($trainee['course_status']);?> <br />
<b>Date Hired : </b><?php readable_text($trainee['hired']);?> <br />
<b>Date of Graduation : </b><?php readable_text($trainee['graduated']);?> <br />
<a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/edit_trainee', array('trainee_id' => $trainee_id))) ?>">Edit Trainee</a>
<a class="btn btn-medium btn-info" href="<?php readable_text(url('exam/view_trainee_score', array('trainee_id' => $trainee_id))) ?>">Exam Scores</a>
<br />
</div>
<a class="btn btn-medium btn-info" href="">Change Photo</a>