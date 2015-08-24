<h3> <?php readable_text($trainee->nickname)?> <?php readable_text($trainee->last_name)?></h3>

<!-- Index Table -->
<table class="gridtable">
<tr>
    <th> Course Name </th>
    <th> Course Category</th>
    <th> Exam Type </th>
    <th> Items </th>
    <th> Score </th>
    <th> Status </th>
    <th> Date Taken </th>
</tr>

<?php foreach ($exam_details as $get_exam_details): ?>
    <tr>
        <td>
            <a href="<?php readable_text(url('exam/edit_score', array('exam_id' => $exam_id))) ?>">
            <?php readable_text($get_exam_details->course_name)?> </a> 
        </td>
        <td> <?php readable_text($get_exam_details->course_type) ?> </a> </td>
        <td> <?php readable_text($get_exam_details->exam_type) ?> </a> </td>
        <td> <?php readable_text($get_exam_details->items) ?> </a> </td>
        <td> <?php readable_text($get_exam_details->score) ?> </a> </td>
        <!--<td> <?php readable_text($get_exam_details->status) ?> </a> </td>-->
        <td> <?php echo $get_exam_details->getByStatus($get_exam_details->trainee_id) ?> </a> </td>
        <td> <?php readable_text($get_exam_details->date_taken) ?> </a> </td>    
    <?php endforeach; ?>
    </tr>
</table>

<a class="btn btn-medium btn-default" href="<?php readable_text(url('exam/add_score', array('trainee_id' => $trainee_id))) ?>">Add</a>