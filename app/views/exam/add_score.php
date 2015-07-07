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

    <?php //Checking of makeup exam score
    if (!empty($exam->validation_errors['makeup_score']['length'])): ?>
        <div>
            <em> Makeup Exam Score </em> must be between
                <?php readable_text($exam->validation['makeup_score']['length'][1]) ?> and
                <?php readable_text($exam->validation['makeup_score']['length'][2]) ?>.
        </div>
    <?php endif ?>

    <?php //Checking of status
    if (!empty($exam->validation_errors['status']['length'])): ?>
        <div>
            <em> Makeup Exam Score </em> must be between
                <?php readable_text($exam->validation['status']['length'][1]) ?> and
                <?php readable_text($exam->validation['status']['length'][2]) ?>.
        </div>
    <?php endif ?>

    <?php //Checking of makeup status
    if (!empty($exam->validation_errors['makeup_status']['length'])): ?>
        <div>
            <em> Makeup Exam Score </em> must be between
                <?php readable_text($exam->validation['makeup_status']['length'][1]) ?> and
                <?php readable_text($exam->validation['makeup_status']['length'][2]) ?>.
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

<form class="form-horizontal">
<form action="<?php readable_text(url('')) ?>" method="POST">

    <label for="course_name"><h5>Course </h5></label>
    <select name="course_name"> 
        <option value="">Please Select</option>
        <option value=""><b>1. Essential Course</b></option>
        <option value="Computer Science">Computer Science</option>
        <option value="Database">Database</option>
        <option value="Data Structures and Algorithms">DSA</option>
        <option value="Networking">Networking</option>
        <option value=""> </option>
        <option value=""><b>2. Language Course</b></option>
        <option value="Linux">Linux</option>
        <option value="PHP">PHP</option>
        <option value="DietCake">DietCake</option>
        <option value=""> </option>
        <option value="Objective C">Objective C</option>
        <option value="iOS">iOS</option>
        <option value=""> </option>
        <option value="Java">Java</option>
        <option value="Android">Android</option>
    </select>

<!--Items-->
    <label for="items"><h5>Items</h5></label>
    <input type="text" name="items" placeholder="Items" value="<?php readable_text(Param::get('items')) ?>">

<!--Score-->
    <label for="score"><h5>Score</h5></label>
    <input type="text" name="score" placeholder="Score" value="<?php readable_text(Param::get('score')) ?>">

 <!--Status-->
    <label for="status"><h5>Status</h5></label>
    <select name="status"> 
        <option value="">Please Select</option>
        <option value="Passed">Passed</option>
        <option value="Failed">Failed</option>
        <option value="Pending">Pending</option>
        <option value="None">None</option>
    </select>

<!--Makeup Score-->
    <label for="makeup_score"><h5>Make-up Score</h5></label>
    <input type="text" name="makeup_score" placeholder="Make-up Score" value="<?php readable_text(Param::get('makeup_score')) ?>">

 <!--Makeup Status-->
    <label for="makeup_status"><h5>Make-up status</h5></label>
    <select name="makeup_status"> 
        <option value="">Please Select</option>
        <option value="Passed">Passed</option>
        <option value="Failed">Failed</option>
        <option value="Pending">Pending</option>
        <option value="None">None</option>
    </select>

<!--Date Taken-->
    <label for="date_taken"><h5>Date Taken</h5></label>
    <input type="text" name="date_taken" placeholder="Date" value="<?php readable_text(Param::get('date_taken')) ?>">

<!--Trainee Id-->
    <input type="hidden" name="trainee_id" value="<?php readable_text(Param::get('trainee_id')) ?>">


<!--Submit-->
    <div class="control-group">
    <div class="controls">
    <form class="well" method="post" action="<?php readable_text(url('exam/add_score_end')) ?>">
    <input type="hidden" name="exam_id" value="<?php readable_text($exam->id) ?>">
    <input type="hidden" name="page_next" value="add_score_end">
    <button type="submit" class="btn btn-info btn-medium">Submit</button>
    <a class="btn btn-medium btn-default" href="<?php readable_text(url('trainee/index')) ?>">Cancel</a>
    </form> 
    </div>
    </div>