<h3>Edit a Trainee</h3>

<?php if ($trainee->hasError()): ?>
    <div class="alert alert-error">
    <h4 class="alert-heading">Oh snap!</h4><h7>Change a few things up and try again.</h7><br /><br />

    <!--Checking: Valid Employee Id-->
    <?php if (!empty($trainee->validation_errors['employee_id']['valid'])): ?>
        <div>
            <em>Employee ID</em> Must only consist of numbers
        </div>
    <?php endif ?>

    <!--Checking: Existing Employee ID-->
    <?php if (!empty($trainee->validation_errors['employee_id']['exist'])): ?>  
        <div>
            <em> Employee ID </em> is already existing!
        </div>
    <?php endif ?>

    <!--Checking: Employee ID Length-->
    <?php if (!empty($trainee->validation_errors['employee_id']['length'])): ?>
        <div>
            <em> Employee ID </em> must be 3 - 11 numbers only.
        </div>
    <?php endif ?>

    <!--Checking: First Name Length-->
    <?php if (!empty($trainee->validation_errors['first_name']['length'])): ?>
        <div>
            <em>Your First Name</em> must be between
            <?php readable_text($trainee->validation['first_name']['length'][1]) ?> and
            <?php readable_text($trainee->validation['first_name']['length'][2]) ?> characters.
        </div>
    <?php endif ?>

    <!--Checking: Valid First Name-->
    <?php if ($trainee->validation_errors['first_name']['valid']): ?>
        <div>
            <em>First Name </em> MUST only consist of letters or hypen (-)</em>
        </div>
    <?php endif ?>

    <!--Checking: Last Name Length-->
    <?php if (!empty($trainee->validation_errors['last_name']['length'])): ?>
        <div><em>Your Last Name</em> must be between
            <?php readable_text($trainee->validation['last_name']['length'][1]) ?> and
            <?php readable_text($trainee->validation['last_name']['length'][2]) ?> characters.
        </div>
    <?php endif ?>

    <!--Checking: Valid Last Name-->
    <?php if ($trainee->validation_errors['last_name']['valid']): ?>
        <div>
            <em>Last Name </em> MUST only consist of letters or hypen (-)</em>
        </div>
    <?php endif ?>

    <!--Checking: Nickname Length-->
    <?php if (!empty($trainee->validation_errors['nickname']['length'])): ?>
        <div><em>Your Nickname/em> must be between
            <?php readable_text($trainee->validation['nickname']['length'][1]) ?> and
            <?php readable_text($trainee->validation['nickname']['length'][2]) ?> characters.
        </div>
    <?php endif ?>

    <!--Checking: Valid Nickname-->
    <?php if ($trainee->validation_errors['nickname']['valid']): ?>
        <div>
            <em>Nickname </em> MUST only consist of letters or hypen (-)</em>
        </div>
    <?php endif ?>

    <!--Checking: Skill Set Length--> 
    <?php if (!empty($trainee->validation_errors['skill_set']['length'])): ?>    
        <div>
            Please select a <em>Skill Set!</em> 
        </div>
      <?php endif ?>

    <!--Checking: Course Status Length-->
    <?php if (!empty($trainee->validation_errors['course_status']['length'])): ?>    
        <div>
            Please select a <em>Skill Set!</em> 
        </div>
    <?php endif ?>

    <!--Checking: Training Status Length--> 
      <?php if (!empty($trainee->validation_errors['training_status']['length'])): ?>
        <div>
            Please select a <em>Training Status!</em> 
        </div>
      <?php endif ?>

    <!--Checking: Course Status Length-->
      <?php if (!empty($trainee->validation_errors['course_status']['length'])): ?>
        <div>
            Please select a <em>Course Status!</em> 
        </div>
      <?php endif ?>

    <!--Checking: Batch Year Length-->  
      <?php if (!empty($trainee->validation_errors['batch_year']['length'])): ?>
        <div>
            Please select a <em>Batch Year!</em> 
        </div>
      <?php endif ?>

    <!--Checking: Batch Term Length-->  
      <?php if (!empty($trainee->validation_errors['batch_term']['length'])): ?>
        <div>
            Please select a <em>Batch Term!</em> 
        </div>
      <?php endif ?>

    <!--Checking: Valid Hired Date--> 
      <?php if (!empty($trainee->validation_errors['date_hired']['valid'])): ?>
        <div>
            Your input on <em>Date Hired</em> is not valid!
        </div>
      <?php endif ?>

    <!--Checking: Valid Graduated Date--> 
      <?php if (!empty($trainee->validation_errors['date_graduated']['valid'])): ?>
        <div>
            Your input on <em>Date of graduation</em> is not valid!
        </div>
      <?php endif ?>

</div>
<?php endif ?> 
    
<form class="form-horizontal">
<form action="<?php readable_text(url('')) ?>" method="POST">
<input type="hidden" name="trainee_id" value="<?php readable_text(Param::get('trainee_id')) ?>">

<?php foreach ($trainee_edit as $trainees): ?>
<!--Employee Id-->
    <div class="control-group">
    <label class="control-label" for="employee_id"><h5>Employee ID</h5></label>
    <div class="controls">
    <input type="text" name="employee_id" value="<?php readable_text($trainees->employee_id) ?>">

    </div>
    </div>

<!--First Name-->
    <div class="control-group">
    <label class="control-label" for="first_name"><h5>First Name</h5></label>
    <div class="controls">
    <input type="text" name="first_name" value="<?php readable_text($trainees->first_name) ?>"> 
    </div>
    </div>

<!--Last Name-->
    <div class="control-group">
    <label class="control-label" for="last_name"><h5>Last Name</h5></label>
    <div class="controls">
    <input type="text" name="last_name" value="<?php readable_text($trainees->last_name) ?>"> 
    </div>
    </div>

<!--Nickname-->
    <div class="control-group">
    <label class="control-label" for="nickname"><h5>Nickname</h5></label>
    <div class="controls">
    <input type="text" name="nickname" value="<?php readable_text($trainees->nickname) ?>"> 
    </div>
    </div>

<!--Skill Set-->
    <div class="control-group">
    <label class="control-label" for="skill_set"><h5>Skill Set</h5></label>
    <div class="controls">
    <select name="skill_set"> 

        <option value="<?php readable_text($trainees->skill_set) ?>"><?php echo $trainees->getBySkillSet($trainees->skill_set) ?></option>
        <option value="<?php readable_text(Trainee::PENDING) ?>">Pending</option>
        <option value="<?php readable_text(Trainee::ANDROID) ?>">Android</option>
        <option value="<?php readable_text(Trainee::IOS) ?>">iOS</option>
        <option value="<?php readable_text(Trainee::PHP) ?>">PHP</option>
        <option value="<?php readable_text(Trainee::UNITY) ?>">Unity</option>
    </select>
    </div>
    </div>

<!--Training Status -->
    <div class="control-group">
    <label class="control-label" for="training_status"><h5>Training Status</h5></label>
    <div class="controls">
    <select name="training_status"> 
        <option  value="<?php readable_text($trainees->training_status) ?>"><?php readable_text($trainees->training_status) ?></option>
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
        <option  value="<?php readable_text($trainees->course_status) ?>"><?php readable_text($trainees->course_status) ?> </option>
        
        <?php foreach ($course_status as $get_course): ?>
            <option value= "<?php readable_text($get_course) ?>">
            <?php readable_text($get_course)?></option>
        <?php endforeach; ?>
    </select>
    </div>
    </div>

<!--Batch Year-->
    <div class="control-group">
    <label class="control-label" for="batch_year"><h5>Year</h5></label>
    <div class="controls">
    <select name="batch_year">        
        <option value="<?php readable_text($trainees->batch_year) ?>"><?php readable_text($trainees->batch_year) ?></option>
        <?php foreach (range(date('Y'), 2013) as $year): ?>
        <option value="<?php echo $year ?>"><?php echo $year ?></option>
        <?php endforeach; ?>
    </select>
    </div>
    </div>

<!--Batch Term-->
    <div class="control-group">
    <label class="control-label" for="batch_term"><h5>Term</h5></label>
    <div class="controls">
    <select name="batch_term">  
    <option value="<?php readable_text($trainees->batch_term) ?>"><?php readable_text($trainees->batch_term) ?></option>
        <option value="1st Term">1st Term</option>
        <option value="2nd Term">2nd Term</option>
    </select>
    </div>
    </div>

<!--Hired -->
    <div class="control-group">
    <label class="control-label" for="date_hired"><h5>Date Hired</h5></label>
    <div class="controls">
    <input type="text" name="date_hired" value="<?php readable_text($trainees->date_hired) ?>">
    </div>
    </div>

<!--Graduated -->
    <div class="control-group">
    <label class="control-label" for="date_graduated"><h5>Date of Graduation</h5></label>
    <div class="controls">
    <input type="text" name="date_graduated" value="<?php readable_text($trainees->date_graduated) ?>">
    </div>
    </div>
<?php endforeach; ?>

<input type="hidden" name="page_next" value="edit_end">
<div class="span12">
<br />
<button class="btn btn-info btn-medium" type="submit">Save</button>
<a href="<?php readable_text(url('trainee/index')) ?>" class="btn btn-medium">Cancel</a>

</div>
</div>
</form>