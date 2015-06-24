<h3> Trainees </h3>

<a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/add_trainee')) ?>">Add Trainee</a>
<br />
<br />
Sort Trainee by:
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


<style type="text/css">
body {
    background:#00000 url('body-bg.jpg');
}
 
.clearfix:after {
    display:block;
    clear:both;
}
 
/*----- Menu Outline -----*/
.menu-wrap {
    width:100%;
    box-shadow:0px 1px 3px rgba(0,0,0,0.2);
    background:#3e3436;
}
 
.menu {
    width:1000px;
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
    font-family:'Ek Mukta';
}
 
.menu a {
    transition:all linear 0.15s;
    color:#919191;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:#be5b70;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
/*----- Top Level -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:14px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
}
 
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    background:#2e2728;
}
 
/*----- Bottom Level -----*/
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
 
.sub-menu {
    width:160%;
    padding:5px 0px;
    position:absolute;
    top:100%;
    left:0px;
    z-index:-1;
    opacity:0;
    transition:opacity linear 0.15s;
    box-shadow:0px 2px 3px rgba(0,0,0,0.2);
    background:#2e2728;
}
 
.sub-menu li {
    display:block;
    font-size:14px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
 
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}
</style>


<!--Trainee Table-->
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
<!-- Table goes in the document BODY -->
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

        <td><a href="<?php readable_text(url('#', array('trainee_id' => $get_from_trainee->id))) ?>">
        <?php readable_text($get_from_trainee->hired) ?> </a> </td>

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