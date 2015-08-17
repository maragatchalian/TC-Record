<h3> Courses</h3>
<link href="/bootstrap/css/custom.css" rel="stylesheet">
<a class="btn btn-medium btn-info" href="<?php readable_text(url('course/add')) ?>">Add Course</a> <br />
<br />

<ul id="courses">
    <?php foreach ($course_categories as $course_category): ?>
        <li>
            <a href="<?php readable_text(url('course/index', array('course_id' => $course_category))) ?>">
            <?php readable_text($course_category); ?></a>
        </li>
    <?php endforeach; ?>
</ul>    

<center>
<!-- Index Table -->   
    <table class="gridtable"> 
    
    <br /> <br />
        <?php foreach ($sub_courses as $get_sub_courses): ?>
            <tr>
                <td> <a href="<?php readable_text(url('course/view_course_details', array('course_id'=>$get_sub_courses->id))) ?>">
                <?php readable_text($get_sub_courses->name) ?> </a> </td>
            </tr>
        <?php endforeach; ?>

    </table>
</center>