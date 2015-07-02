<br />
<h4> <?php readable_text($course['name']);?></h4>
	Category: <?php readable_text($course['category']);?> 

<br />
<br />
<a class="btn btn-medium btn-info" href="<?php readable_text(url('course/edit_course', array('course_id' => $course_id))) ?>">Edit</a>