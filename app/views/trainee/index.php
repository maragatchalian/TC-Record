<h3> Trainees </h3>
<link href="/bootstrap/css/custom.css" rel="stylesheet">

<a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/add_trainee')) ?>">Add Trainee</a>
<br />
<br />

<div class="menu-wrap">
    <nav class="menu">
        <ul class="clearfix">

        <!--Sort by Date Hired-->
            <li>
                <a href="<?php readable_text(url('trainee/index')) ?>">Date Hired</span></a>
            </li>

        <!--Sort by Training Status-->
            <li>
                <a href="">Training Status <span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">      
                   <li>
                    <?php foreach ($training_status as $get_training_status): //List of Training Statuses?>
                        <a href="<?php readable_text(url('trainee/sort_by_trainee_id', array('trainee_id'=>$get_training_status))) ?>">  
                        <?php readable_text($get_training_status); ?></a>
                    <?php endforeach; ?>
                    </li>   
                </ul>
            </li>    

        <!--Sort by Skill Set-->
            <li>
                <a href="">Skill Set <span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">      
                   <li>
                    <?php foreach ($skill_set as $get_skill_set): //List of Skill Set?>
                        <a href="<?php readable_text(url('trainee/sort_by_skill_set', array('trainee_id'=>$get_skill_set))) ?>"> 
                        <?php readable_text($get_skill_set); ?></a>
                    <?php endforeach; ?>
                    </li>   
                </ul>
            </li>    

        <!--Sort by Batch-->
            <li>
                <a href="">Batch <span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">      
                   <li>
                    <?php foreach ($batch as $get_batch): //List of Skill Set?>
                        <a href="<?php readable_text(url('trainee/sort_by_batch', array('trainee_id'=>$get_batch))) ?>"> 
                        <?php readable_text($get_batch); ?></a>
                    <?php endforeach; ?>
                    </li>   
                </ul>
            </li>    

        <!--Sort by Course Status-->
            <li>
                <a href="">Course <span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">      
                   <li>
                    <?php foreach ($course_status as $get_course_status): //List of Skill Set?>
                        <a href="<?php readable_text(url('trainee/sort_by_course_status', array('trainee_id'=>$get_course_status))) ?>"> 
                        <?php readable_text($get_course_status); ?></a>
                    <?php endforeach; ?>
                    </li>   
                </ul>
            </li>    
        </ul>
    </nav>
</div>


<!-- Index Table -->
<table class="gridtable">
<tr>
    <th> Employee ID </th>
    <th> Date Hired</th>
    <th> Last Name </th>
    <th> First Name </th>
    <th> Batch </th>
    <th> Skill </th>
    <th> Training Status </th>
    <th> Current Course </th>
    <th> Exam Date </th>
</tr>

<?php foreach ($trainees as $get_from_trainee): ?>
    <tr>
        <td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
        <?php readable_text($get_from_trainee->employee_id) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->hired) ?> </a> </td>

        <td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
        <?php readable_text($get_from_trainee->last_name) ?> </a> </td>
    
        <td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
        <?php readable_text($get_from_trainee->first_name) ?> </a> </td>
    
        <td> <?php readable_text($get_from_trainee->batch) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->skill_set) ?> </a> </td>

        <td> <a href="<?php readable_text(url('trainee/edit_trainee', array('trainee_id' => $get_from_trainee->id))) ?>"><?php readable_text($get_from_trainee->training_status) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->course_status) ?> </a> </td>

    <?php endforeach; ?> 
    </tr>
</table>
