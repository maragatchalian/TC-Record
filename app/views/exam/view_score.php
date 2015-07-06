<h3> <?php readable_text($trainee->first_name)?> <?php readable_text($trainee->last_name)?></h3>
<br />
<h5> Essential Course </h5>
<br />


<!-- Index Table -->
<table class="gridtable">
<tr>
    <th> Course Name </th>
    <th> Items</th>
    <th> Score </th>
    <th> Status </th>
    <th> Make-up Exam </th>
    <th> Make-up Status </th>
    <th> Date Taken </th>
</tr>

<?php foreach ($exam as $get_from_trainee): ?>
    <tr>
        <td> <?php readable_text($get_from_trainee->course_name)?> </a> </td>
        <td> <?php readable_text($get_from_trainee->items) ?> </a> </td>
        <td> <?php readable_text($get_from_trainee->score) ?> </a> </td>
        <td> <?php readable_text($get_from_trainee->status) ?> </a> </td>
        <td> <?php readable_text($get_from_trainee->makeup_score) ?> </a> </td>
        <td> <?php readable_text($get_from_trainee->makeup_status) ?> </a> </td>
        <td> <?php readable_text($get_from_trainee->date_taken) ?> </a> </td>


    <?php endforeach; ?> 
    </tr>
</table>

<a class="btn btn-medium btn-default" href="<?php readable_text(url('exam/add_score', array('trainee_id' => $trainee_id))) ?>">Add</a>