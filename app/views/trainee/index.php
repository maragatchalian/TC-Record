<h3> Trainees </h3>
<link href="/bootstrap/css/custom.css" rel="stylesheet">

<a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/add')) ?>">Add Trainee</a>
<br />
<br />

<div id='cssmenu'>
    <ul>
        <!--Sort by Date Hired-->
        <li>
            <a href="<?php readable_text(url('trainee/index')) ?>">Date Hired</span></a>
        </li>

        <!--Sort by Training Status-->
            <li class='has-sub '><a href="">Training Status <span class="arrow">&#9660;</span></a>
                <ul>      
                    <?php foreach ($training_status as $get_training_status): ?>
                    <li class='has-sub'>
                        <a href="<?php readable_text(url('trainee/index', array('sort_by' => 'training_status', 'data'=>$get_training_status))) ?>"> 
                        <?php readable_text($get_training_status); ?></a>
                    <?php endforeach; ?>
                    </li>   
                </ul> 
            </li>

        <!--Sort by Skill Set-->
            <li class='has-sub'><a href="">Skill Set <span class="arrow">&#9660;</span></a>
                <ul> 
                    <?php foreach ($skill_set as $get_skill_set): ?>     
                    <li>
                        <a href="<?php readable_text(url('trainee/index', array('sort_by' => 'skill_set', 'data'=>$get_skill_set))) ?>"> 
                        <?php readable_text($get_skill_set); ?></a>
                    <?php endforeach; ?>
                    </li>   
                </ul>
            </li>  

        <!--Sort by Batch-->
            <li class='has-sub'><li> <a href="">Batch <span class="arrow">&#9660;</span></a>
                <ul>
                    <?php foreach ($batch_year as $get_batch_year): ?>       
                    <li class='has-sub'>
                        <a href="<?php readable_text(url('trainee/index', array('sort_by' => 'batch_year', 'data'=>$get_batch_year))) ?>"> 
                        <?php readable_text($get_batch_year); ?></a>
                         <ul>
                            <?php foreach ($batch_term as $get_batch_term): ?> 
                            <li>
                                <a href="<?php readable_text(url('trainee/index', array('sort_by' => 'batch_term', 'data'=> $get_batch_year . '_' . $get_batch_term))) ?>"> 
                                <?php readable_text($get_batch_term); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                    </li>    
                </ul>
            </li>

        <!--Sort by Course Status-->
            <li>
                <li class='has-sub'><a href="">Course <span class="arrow">&#9660;</span></a>
                <ul>      
                    <?php foreach ($course_status as $get_course_status): ?>
                    <li>
                        <a href="<?php readable_text(url('trainee/index', array('sort_by' => 'course_status', 'data'=>$get_course_status))) ?>"> 
                        <?php readable_text($get_course_status); ?></a>
                    <?php endforeach; ?>
                    </li>   
                </ul>
            </li>    
    </ul>
</div>

<!-- Index Table -->
<table class="gridtable">
<tr>
    <th> Nickname </th>
    <th> Date Hired</th>
    <th> Last Name </th>
    <th> First Name </th>
    <th> Batch Year</th>
    <th> Batch Term</th>
    <th> Skill </th>
    <th> Training Status </th>
    <th> Current Course </th>
    <th> Exam Date </th>
</tr>

<?php foreach ($trainees as $get_from_trainee): ?>
    <tr>
        <td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">   
        <?php readable_text($get_from_trainee->nickname) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->hired) ?> </a> </td>

        <td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
        <?php readable_text($get_from_trainee->last_name) ?> </a> </td>
    
        <td><a href="<?php readable_text(url('trainee/view_trainee_profile', array('trainee_id' => $get_from_trainee->id))) ?>">
        <?php readable_text($get_from_trainee->first_name) ?> </a> </td>
    
        <td> <?php readable_text($get_from_trainee->batch_year) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->batch_term) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->skill_set) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->training_status) ?> </a> </td>

        <td> <?php readable_text($get_from_trainee->course_status) ?> </a> </td>

    <?php endforeach; ?> 
    </tr>
</table>