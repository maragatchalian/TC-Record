<br />
<h4> <?php readable_text($course['name']);?></h4>
    Category: <?php readable_text($course['category']);?> 

<br />
<br />
<a class="btn btn-medium btn-default" href="<?php readable_text(url('course/edit', array('course_id' => $course_id))) ?>">Edit</a>
<a class="btn btn-medium btn-danger" href="<?php readable_text(url('course/delete', array('course_id' => $course_id)))?>"
 	onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
