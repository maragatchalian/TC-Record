<br />
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
            <li>
                <a href="<?php readable_text(url('trainee/index')) ?>">Date Hired</span></a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-expanded="false">
                    Training Status <span class="caret"></span>
                </a>
            
            <ul class="sub-menu">
                <li>
                    <a href="<?php readable_text(url('thread/index')) ?>">
                        <i class="icon-calendar"></i> On-Training
                    </a>
                </li>

                <li>
                    <a href="<?php readable_text(url('thread/top_threads', array('type'=>'comment'))) ?>">
                        <i class="icon-comment"></i> Graduated
                    </a>
                </li>

                <li>
                    <a href="<?php readable_text(url('thread/top_threads', array('type'=>'follow'))) ?>">
                        <i class="icon-eye-open"></i> EOC
                    </a>
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


.navbar .nav li.dropdown.open > .dropdown-toggle, .navbar .nav li.dropdown.active > .dropdown-toggle, .navbar .nav li.dropdown.open.active > .dropdown-toggle {
    color: #FFF;
}
.navbar .nav li.dropdown.open > .dropdown-toggle .caret, .navbar .nav li.dropdown.active > .dropdown-toggle .caret, .navbar .nav li.dropdown.open.active > .dropdown-toggle .caret {
    border-top-color:#FFF;
}


<br />
<br />
<br />
TODO: Display/Sort Trainees <br /><br />

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
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
    <th> Course </th>
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