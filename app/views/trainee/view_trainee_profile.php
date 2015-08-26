<?php foreach ($trainee as $trainees): ?>
    <h3> <?php readable_text($trainees->last_name) ?>, <?php readable_text($trainees->first_name) ?> </h3>
 
     <b>Employe ID:</b> <?php readable_text($trainees->employee_id) ?> </h3>

<div class="avatar-big float-left">
<img src='' width="200" height="200" align="left" class="img-rounded" />
</div>

<br />
<div class="float-right user-details">
    <b>Nickname: </b>  <?php readable_text($trainees->nickname) ?> <br />
    <b>Batch : </b>  <?php readable_text($trainees->batch_year) ?> <?php readable_text($trainees->batch_term) ?> <br />
    <b>Primary Skill :</b><?php echo $trainees->getBySkillSet($trainees->skill_set) ?> <br /> 
    <b>Training Status : </b><?php readable_text($trainees->training_status) ?> <br />
    <b>Course Status :</b><?php readable_text($trainees->course_status) ?> <br />
    <b>Date Hired : </b> <?php readable_text($trainees->date_hired) ?> <br />
    <b>Date of Graduation : </b><?php readable_text($trainees->date_graduated) ?> <br />

<?php endforeach; ?>
<br />
<br />
    <a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/edit', array('trainee_id' => $trainee_id))) ?>">Edit Trainee</a>
    <a class="btn btn-medium btn-info" href="<?php readable_text(url('exam/view_trainee_score', array('trainee_id' => $trainee_id))) ?>">Exam Scores</a>
<br />

</div>
<a class="btn btn-medium btn-info" href="">Change Photo</a>
<a class="btn btn-medium btn-danger" href="<?php readable_text(url('trainee/delete', array('trainee_id' => $trainee_id)))?>"
    onclick="return confirm('Are you sure you want to delete this trainee?')">Delete</a>