<h2><?php readable_text($course->name) ?></h2>         
    <p class="alert alert-success">
        You've successfully added a Course!               
    </p>
                 
<a href="<?php readable_text(url('course/view_course_details', array('course_id' => $course_id))) ?>">
    &larr; Back to Courses 
</a>

