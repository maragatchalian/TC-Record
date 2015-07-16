<h3>Add a Course</h3>

<?php if ($course->hasError()): ?>
    <div class="alert alert-error">
    <h4 class="alert-heading">Oh snap!</h4>
    <h7>Change a few things up and try again.</h7>
    <br /> <br />

        <!--Checking: Course Name Length-->
        <?php if (!empty($course->validation_errors['name']['length'])): ?>
            <div>
                <em> Name </em> must be between
                    <?php readable_text($course->validation['name']['length'][1]) ?> and
                    <?php readable_text($course->validation['name']['length'][2]) ?> characters.
            </div>
        <?php endif ?>

        <!--Checking: Valid Course Name-->
        <?php if (!empty($course->validation_errors['name']['valid'])): ?>
            <div>
                Invalid <em>Name</em>!
            </div>
        <?php endif ?>

        <!--Checking: Selecting a Category-->
        <?php if (!empty($course->validation_errors['category']['length'])): ?>    
            <div>
                Please select a <em>Category!</em> 
            </div>
        <?php endif ?>

    </div>
<?php endif ?> 

<form class="form-horizontal">
<form action="<?php readable_text(url('')) ?>" method="POST">

<!--Course Category-->
    <label for="category"><h5>Category</h5></label>
    <select name="category"> 
        <option value="">Please Select</option>
        <option value="Essential Course">Essential Course</option>
        <option value="Language Course">Language Course</option>
        <option value="Project Course">Project Course</option>
    </select>

<!--Course Name-->
    <label for="name"><h5>Course Name</h5></label>
    <input type="text" name="name" placeholder="Course Name" value="<?php readable_text(Param::get('name')) ?>">

<!--Submit-->
    <br /><br />
    <form class="well" method="post" action="<?php readable_text(url('course/add_end')) ?>">
    <input type="hidden" name="course_id" value="<?php readable_text($course->id) ?>">
    <input type="hidden" name="page_next" value="add_end">
    <button type="submit" class="btn btn-info btn-medium">Submit</button>
    <a class="btn btn-medium btn-default" href="<?php readable_text(url('course/index')) ?>">Cancel</a>
    </form> 

</form>
</form>