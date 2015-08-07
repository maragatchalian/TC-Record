<h3>Edit Score</h3>

<?php if ($exam->hasError()): ?>
    <div class="alert alert-error">
    <h4 class="alert-heading">Oh snap!</h4>
    <h7>Change a few things up and try again.</h7>

    <br />
    <br />

    <?php //Checking of course name
    if (!empty($exam->validation_errors['course_name']['length'])): ?>
        <div>
            <em> Course Name </em> must be between
                <?php readable_text($exam->validation['course_name']['length'][1]) ?> and
                <?php readable_text($exam->validation['course_name']['length'][2]) ?> characters.
        </div>
    <?php endif ?>

   <?php //Checking of score items
    if (!empty($exam->validation_errors['items']['length'])): ?>
        <div>
            <em> Number of Exam Items </em> must be between
                <?php readable_text($exam->validation['items']['length'][1]) ?> and
                <?php readable_text($exam->validation['items']['length'][2]) ?>.
        </div>
    <?php endif ?>

    <?php //Checking of score
    if (!empty($exam->validation_errors['score']['length'])): ?>
        <div>
            <em> Exam Score </em> must be between
                <?php readable_text($exam->validation['score']['length'][1]) ?> and
                <?php readable_text($exam->validation['score']['length'][2]) ?>.
        </div>
    <?php endif ?>

    <?php //Checking of status
    if (!empty($exam->validation_errors['status']['length'])): ?>
        <div>
            <em> Exam Status </em> must be between
                <?php readable_text($exam->validation['status']['length'][1]) ?> and
                <?php readable_text($exam->validation['status']['length'][2]) ?>.
        </div>
    <?php endif ?>

    <?php //Checking of Date Taken
    if (!empty($exam->validation_errors['date_taken']['valid'])): ?>
        <div>
        Your input on <em>Date Taken</em> is not valid!
        </div>
      <?php endif ?>

    </div>
<?php endif ?> 

<br />

<form class="form-horizontal">
<form action="<?php readable_text(url('')) ?>" method="POST">

<!--Course Name -->
    <div class="control-group">
    <label class="control-label" for="course_name"><h5>Course Name</h5></label>
    <div class="controls">
    <select name="course_name"> 
        <option value="<?php readable_text($exam_edit['name']) ?>"><?php readable_text($exam_edit['course_name']) ?></option>
        
        <?php foreach ($course_status as $get_course): ?>
            <option value= "<?php readable_text($get_course) ?>">
            <?php readable_text($get_course)?></option>
        <?php endforeach; ?>
    </select>
    </div>
    </div>

<!--Course Course-->
    <div class="control-group">
    <label class= "control-label" for="course_type"><h5>Course Category</h5></label>
    <div class="controls">
    <select name="course_type"> 
        <option value="<?php readable_text($exam_edit['course_type']) ?>"><?php readable_text($exam_edit['course_type']) ?></option>
        <option value="Essential Course">Essential Course</option>
        <option value="Language Course">Language Course</option>
        <option value="Project Course">Project Course</option>
    </select>
    </div>
    </div>

<!--Exam Type-->
    <div class="control-group">
    <label class= "control-label" for="status"><h5>Exam Type</h5></label>
    <div class="controls">
    <select name="exam_type"> 
        <option value ="<?php readable_text($exam_edit['exam_type']) ?>"><?php readable_text($exam_edit['exam_type']) ?></option>
        <option value="Initial Exam">Initial Exam</option>
        <option value="Makeup Exam">Makeup Exam</option>
    </div>
    </div>

<!--Items-->
    <div class="control-group">
    <label class= "control-label" for="items"><h5>Items</h5></label>
    <div class="controls">
    <input type="text" name="items" value= "<?php readable_text($exam_edit['items']) ?>">
    </div>
    </div>

<!--Score-->
    <div class="control-group">
    <label class= "control-label" for="score"><h5>Score</h5></label>
    <div class="controls">
    <input type="text" name="score" value= "<?php readable_text($exam_edit['score']) ?>">
    </div>
    </div>

<!--Status-->
    <div class="control-group">
    <label class= "control-label" for="status"><h5>Status</h5></label>
    <div class="controls">
    <select name="status"> 
        <option value = "<?php readable_text($exam_edit['status']) ?>"><?php readable_text($exam_edit['status'])?></option>
        <option value="Passed">Passed</option>
        <option value="Failed">Failed</option>
        <option value="Pending">Pending</option>
        <option value="None">None</option>
    </select>
    </div>
    </div>

<!--Date Taken-->
    <div class="control-group">
    <label class= "control-label" for="date_taken"><h5>Date Taken</h5></label>
    <input type="text" name="date_taken" value = "<?php readable_text($exam_edit['date_taken']) ?>">
    </div>
    </div>

<!--Exam Id-->
    <input type="hidden" name="trainee_id" value="<?php readable_text(Param::get('exam_id')) ?>">

<!--Submit-->
    <div class="control-group">
    <div class="controls">
    <form class="well" method="post" action="<?php readable_text(url('exam/edit_score_end')) ?>">
    <input type="hidden" name="exam_id" value="<?php readable_text($exam->id) ?>">
    <input type="hidden" name="page_next" value="edit_score_end">
    <button type="submit" class="btn btn-info btn-medium">Save</button>
    <a class="btn btn-medium btn-default" href="<?php readable_text(url('trainee/index')) ?>">Cancel</a>
    </form> 
    </div>
    </div>

</form>
</form>