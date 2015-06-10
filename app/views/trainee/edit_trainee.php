<font color = "black">
<h3>Edit a Trainee</h3>

<?php if ($trainee->hasError()): ?>
    <div class="alert alert-error">
        <h4 class="alert-heading">Oh snap!</h4><h7>Change a few things up and try again.</h7><br /><br />

<?php //Checking of Employee if it's valid
if ($trainee->validation_errors['employee_id']['valid']): ?>
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

<!--Last Name-->
    <div class="control-group">
    <label class="control-label" for="last_name"><h5>Last Name</h5></label>
    <div class="controls">
    <input type="text" name="last_name" placeholder="Last Name" value="<?php readable_text(Param::get('last_name')) ?>"> 
    </div>
    </div>

<input type="hidden" name="page_next" value="edit_trainee_end">
<div class="span12">
<br />
<button class="btn btn-info btn-medium" type="submit">Save</button>
<a href="<?php readable_text(url('trainee/index')) ?>" class="btn btn-medium">Cancel</a>

<a href="<?php readable_text(url('trainee/delete', array('trainee_id' => $trainee->id)))?>"
onclick="return confirm('Are you sure you want to delete this Trainee?')">
<span class ="icon-trash"></span>
</a> Delete This Trainee<font color ="white">...</font>

</div>
</div>

</form>
</font>