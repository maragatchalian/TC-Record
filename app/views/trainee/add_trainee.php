<font color = "black">
<h3>Add a Trainee</h3>

<?php //if ($trainee->hasError()): ?>
    <!--<div class="alert alert-error">
        <h4 class="alert-heading">Oh snap!</h4><h7>Change a few things up and try registering again.</h7><br /><br/>
<?php
/*
<?php 
//Checking of username if it's valid
    if ($trainee->validation_errors['employee_id']['valid']): ?>
    <div>
        <em>Username may only consist of letters, numbers,  hypen (-), underscores(_), and dots(.).</em>
    </div>
<?php endif ?>

<?php 
//Checking of username length 
if (!empty($user->validation_errors['username']['length'])): ?>
    <div>
        <em>Your Username</em> must be between
        <?php readable_text($user->validation['username']['length'][1]) ?> and
        <?php readable_text($user->validation['username']['length'][2]) ?> characters.
    </div>
<?php endif ?>

<?php 
//Checking of username if it exists
if (!empty($user->validation_errors['username']['exist'])): ?>
    <div>
        <em> Username is already taken. Please choose another.</em>
    </div>
<?php endif ?>

<?php 
//Checking of first_name length
if (!empty($user->validation_errors['first_name']['length'])): ?>
    <div>
        <em>Your First Name</em> must be between
            <?php readable_text($user->validation['first_name']['length'][1]) ?> and
            <?php readable_text($user->validation['first_name']['length'][2]) ?> characters.
    </div>
<?php endif ?>

<?php 
//Checking of first_name if it's valid.
    if ($user->validation_errors['first_name']['valid']): ?>
    <div>
        <em>First Name </em> MUST only consist of letters or hypen (-)</em>
    </div>
<?php endif ?>

<?php 
//Last Name Validation
    if (!empty($user->validation_errors['last_name']['length'])): ?>
    <div><em>Your Last Name</em> must be between
        <?php readable_text($user->validation['last_name']['length'][1]) ?> and
        <?php readable_text($user->validation['last_name']['length'][2]) ?> characters.
    </div>
<?php endif ?>

<?php
//Checking of first_name if it's valid.
if ($user->validation_errors['last_name']['valid']): ?>
    <div>
        <em>Last Name </em> MUST only consist of letters or hypen (-)</em>
    </div>
<?php endif ?>


<?php 
//Email Validation
if (!empty($user->validation_errors['email']['length'])): ?>
    <div><em>Your Email</em> must be 
        <?php readable_text($user->validation['email']['length'][1]) ?> 
        <?php readable_text($user->validation['email']['length'][2]) ?> characters and below only.
    </div>
<?php endif ?>

<?php
//Checking of email if it already exists 
if(!empty($user->validation_errors['email']['exist'])): ?>
    <div>
         <em> Your email address</em> is already registered. Please choose another.
    </div>
<?php endif ?>

<?php 
//Password Validation
if (!empty($user->validation_errors['password']['length'])): ?>
    <div><em>Your Password</em> must be between
        <?php readable_text($user->validation['password']['length'][1]) ?> and
        <?php readable_text($user->validation['password']['length'][2]) ?> characters.
    </div>
<?php endif ?>

<?php 
//Checking if Password and Confirm Password matched
if (!empty($user->validation_errors['confirm_password']['match'])) : ?> 
    <div>
        <em>Passwords</em> did not match!
    </div>
<?php endif ?>

<!--User Type  Validation Error Message--> 
  <?php if (!empty($user->validation_errors['user_type']['length'])): ?>    
    <div>
     Please select a <em>User Type!</em> 
    </div>
  <?php endif ?>

</div>
<?php endif ?> 
*/
?>
</div>
<?php //endif ?>
-->
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
        <option value="Project Course">EOC</option>
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
    <input type="text" name="hired" placeholder="mm/dd/yyyy" value="<?php readable_text(Param::get('hired')) ?>">
    </div>
    </div>

<!--Graduated -->
    <div class="control-group">
    <label class="control-label" for="graduated"><h5>Date of Graduation</h5></label>
    <div class="controls">
    <input type="text" name="graduated" placeholder="mm/dd/yyyy" value="<?php readable_text(Param::get('graduated')) ?>">
    </div>
    </div>

<!--Submit-->
    <div class="control-group">
    <div class="controls">
    <form class="well" method="post" action="<?php readable_text(url('trainee/add_trainee_end')) ?>">
    <input type="hidden" name="trainee_id" value="<?php readable_text($trainee->id) ?>">
    <input type="hidden" name="page_next" value="add_trainee_end">
    <button type="submit" class="btn btn-info btn-medium">Submit</button>
    </form> 
    </div>
    </div>
</form>
</font>