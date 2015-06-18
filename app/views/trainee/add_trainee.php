<font color = "black">
<h3>Add a Trainee</h3>

<?php if ($trainee->hasError()): ?>
    <div class="alert alert-error">
        <h4 class="alert-heading">Oh snap!</h4><h7>Change a few things up and try again.</h7><br /><br/>

<?php //Checking of Employee ID if it's valid
if (!empty($trainee->validation_errors['employee_id']['valid'])): ?>
    <div>
        <em>Employee ID</em> Must only consist of numbers
    </div>
<?php endif ?>

<?php 
//Checking of Employee ID if it exists
if (!empty($trainee->validation_errors['employee_id']['exist'])): ?>
    <div>
        <em> Employee ID </em> is already existing!
    </div>
<?php endif ?>

<?php 
//Checking of Employee ID length
if (!empty($trainee->validation_errors['employee_id']['length'])): ?>
    <div>
        <em> Employee ID </em> must be 3 - 11 numbers only.
    </div>
<?php endif ?>

<?php 
//Checking of first_name length
if (!empty($trainee->validation_errors['first_name']['length'])): ?>
    <div>
        <em>Your First Name</em> must be between
            <?php readable_text($trainee->validation['first_name']['length'][1]) ?> and
            <?php readable_text($trainee->validation['first_name']['length'][2]) ?> characters.
    </div>
<?php endif ?>

<?php 
//Checking of first_name if it's valid.
    if ($trainee->validation_errors['first_name']['valid']): ?>
    <div>
        <em>First Name </em> MUST only consist of letters or hypen (-)</em>
    </div>
<?php endif ?>

<?php 
//Last Name Validation
    if (!empty($trainee->validation_errors['last_name']['length'])): ?>
    <div><em>Your Last Name</em> must be between
        <?php readable_text($trainee->validation['last_name']['length'][1]) ?> and
        <?php readable_text($trainee->validation['last_name']['length'][2]) ?> characters.
    </div>
<?php endif ?>

<?php
//Checking of last_name if it's valid.
if ($trainee->validation_errors['last_name']['valid']): ?>
    <div>
        <em>Last Name </em> MUST only consist of letters or hypen (-)</em>
    </div>
<?php endif ?>


<!--Skill Set Validation Error Message--> 
  <?php if (!empty($trainee->validation_errors['skill_set']['length'])): ?>    
    <div>
     Please select a <em>Skill Set!</em> 
    </div>
  <?php endif ?>

  <!--Course Status Validation Error Message--> 
  <?php if (!empty($trainee->validation_errors['course_status']['length'])): ?>    
    <div>
     Please select a <em>Skill Set!</em> 
    </div>
  <?php endif ?>

<!--Training Status Validation Error Message--> 
  <?php if (!empty($trainee->validation_errors['training_status']['length'])): ?>
    <div>
     Please select a <em>Training Status!</em> 
    </div>
  <?php endif ?>

<!--Course Status Validation Error Message--> 
  <?php if (!empty($trainee->validation_errors['course_status']['length'])): ?>
    <div>
     Please select a <em>Course Status!</em> 
    </div>
  <?php endif ?>

<!--Batch Validation Error Message--> 
  <?php if (!empty($trainee->validation_errors['batch']['length'])): ?>
    <div>
     Please select a <em>Batch!</em> 
    </div>
  <?php endif ?>

<!--Hired Validation Error Message--> 
  <?php if (!empty($trainee->validation_errors['hired']['valid'])): ?>
    <div>
    Your input on <em>Date Hired</em> is not valid!
    </div>
  <?php endif ?>

<!--Hired Validation Error Message--> 
  <?php if (!empty($trainee->validation_errors['graduated']['valid'])): ?>
    <div>
    Your input on <em>Date of graduation</em> is not valid!
    </div>
  <?php endif ?>



</div>
<?php endif ?> 
    

<form class="form-horizontal">
<form action="<?php readable_text(url('')) ?>" method="POST">
<!--Employee Id-->
    <div class="control-group">
    <label class="control-label" for="employee_id"><h5>Employee ID</h5></label>
    <div class="controls">
    <input type="text" name="employee_id" placeholder="Employee ID" value="<?php readable_text(Param::get('employee_id')) ?>">
    </div>
    </div>

<!--First Name-->
    <div class="control-group">
    <label class="control-label" for="first_name"><h5>First Name</h5></label>
    <div class="controls">
    <input type="text" name="first_name" placeholder="First Name" value="<?php readable_text(Param::get('first_name')) ?>">
    </div>
    </div>

<!--Last Name-->
    <div class="control-group">
    <label class="control-label" for="last_name"><h5>Last Name</h5></label>
    <div class="controls">
    <input type="text" name="last_name" placeholder="Last Name" value="<?php readable_text(Param::get('last_name')) ?>">
    </div>
    </div>

<!--Skill Set-->
    <div class="control-group">
    <label class="control-label" for="skill_set"><h5>Skill Set</h5></label>
    <div class="controls">
    <select name="skill_set"> 
        <option value="">Please Select</option>
        <option value="Pending">Pending</option>
        <option value="Android">Android</option>
        <option value="iOS">iOS</option>
        <option value="PHP">PHP</option>
        <option value="Unity">Unity</option>
    </select>
    </div>
    </div>

<!--Training Status -->
    <div class="control-group">
    <label class="control-label" for="training_status"><h5>Training Status</h5></label>
    <div class="controls">
    <select name="training_status"> 
        <option value="">Please Select</option>
        <option value="Graduated">Graduated</option>
        <option value="On-Training">On-Training</option>
        <option value="EOC">EOC</option>
    </select>
    </div>
    </div>

<!--Course Status -->
    <div class="control-group">
    <label class="control-label" for="course_status"><h5>Course Status</h5></label>
    <div class="controls">
    <select name="course_status"> 
        <option value="">Please Select</option>
        <option value="Essential Course">Essential Course</option>
        <option value="Language Course">Language Course</option>
        <option value="Project Course">Project Course</option>
        <option value="EOC">EOC</option>
        <option value="Done - Graduated">Done - Graduated</option>
    </select>
    </div>
    </div>

<!--Batch -->
    <div class="control-group">
    <label class="control-label" for="batch"><h5>Batch</h5></label>
    <div class="controls">
    <select name="batch">        
        <option value="">Please Select</option>
        <option value="2015 - 1st Sem">2015 - 1st Sem</option>
        <option value="2014 - 2nd Sem">2014 - 2nd Sem</option>
        <option value="2014 - 1st Sem">2014 - 1st Sem</option>
    </select>
    </div>
    </div>

<!--Hired -->
    <div class="control-group">
    <label class="control-label" for="hired"><h5>Date Hired</h5></label>
    <div class="controls">
    <input type="text" name="hired" placeholder="yyyy/mm/dd" value="<?php readable_text(Param::get('hired')) ?>">
    </div>
    </div>

<!--Graduated -->
    <div class="control-group">
    <label class="control-label" for="graduated"><h5>Date of Graduation</h5></label>
    <div class="controls">
    <input type="text" name="graduated" placeholder="yyyy/mm/dd" value="<?php readable_text(Param::get('graduated')) ?>">
    </div>
    </div>

<!--Submit-->
    <div class="control-group">
    <div class="controls">
    <form class="well" method="post" action="<?php readable_text(url('trainee/add_trainee_end')) ?>">
    <input type="hidden" name="trainee_id" value="<?php readable_text($trainee->id) ?>">
    <input type="hidden" name="page_next" value="add_trainee_end">
    <button type="submit" class="btn btn-info btn-medium">Submit</button>
    <a class="btn btn-medium btn-default"
      href="<?php readable_text(url('trainee/index')) ?>">Cancel</a>
    </form> 
    </div>
    </div>
</form>
</font>