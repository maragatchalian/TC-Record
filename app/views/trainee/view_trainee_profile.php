<h3> <?php readable_text($trainee['last_name']);?>,
     <?php readable_text($trainee['first_name']);?> </h3>

<div class="avatar-big float-left">
<img src='' width="250" height="250" align="left" class="img-rounded" />
</div>

<br />
<br />
<a class="btn btn-medium btn-info" href="">Change Photo</a>
<a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/edit_trainee', array('trainee_id' => $trainee_id))) ?>">Edit Profile</a>

<br />
<div class="float-right user-details">
<h3 style='margin-top:2; line-height:22px;'>User Details</h3>
<b>Batch : </b>  <?php readable_text($trainee['batch']);?> <br />
<b>Primary Skill : </b>  <?php readable_text($trainee['skill_set']);?> <br />
<b>Training Status : </b><?php readable_text($trainee['training_status']);?> <br />
<b>Course Status : </b><?php readable_text($trainee['course_status']);?> <br />
<b>Date Hired : </b><?php readable_text($trainee['hired']);?> <br />
<b>Date of Graduation : </b><?php readable_text($trainee['graduated']);?> <br />
</div>