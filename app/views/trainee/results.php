
<!-- Index Table -->
<style type="text/css">
table.gridtable {
font-family: verdana,arial,sans-serif;
font-size:14px;
color:#333333;
border-width: 1px;
border-color: #666666;
border-collapse: collapse;
}
table.gridtable th {
border-width: 1px;
padding: 8px;
border-style: solid;
border-color: #666666;
background-color: #dedede;
}
table.gridtable td {
border-width: 1px;
padding: 8px;
border-style: solid;
border-color: #666666;
background-color: #ffffff;
}
</style>
<br /> 
<br /> 
<!-- Table goes in the document BODY -->
<table class="gridtable">
<tr>
<th> Employee ID </th>
<th> Date Hired </th>
<th> Last Name </th>
<th> First Name </th>
<th> Batch </th>
<th> Skill </th>
<th> Training Status</th>
<th> Course </th>
<th> Exam Date </th>
</tr>
<?php foreach ($trainees as $get_from_trainee): ?>
<tr>
<td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
<?php readable_text($get_from_trainee->employee_id) ?> </a> </td>

<td><?php readable_text($get_from_trainee->hired) ?> </a> </td>

<td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
<?php readable_text($get_from_trainee->last_name) ?> </a> </td>

<td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
<?php readable_text($get_from_trainee->first_name) ?> </a> </td>

<td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
<?php readable_text($get_from_trainee->batch) ?> </a> </td>

<td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
<?php readable_text($get_from_trainee->skill_set) ?> </a> </td>

<td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
<?php readable_text($get_from_trainee->training_status) ?> </a> </td>

<td><a href="<?php readable_text(url('#', array('trainee_id' => $get_from_trainee->id))) ?>">
<?php readable_text($get_from_trainee->course_status) ?> </a> </td>

<?php endforeach; ?>
</tr>
</table>