<h3> Courses</h3>
<link href="/bootstrap/css/custom.css" rel="stylesheet">
<a class="btn btn-medium btn-info" href="<?php readable_text(url('course/add_course')) ?>">Add Course</a> <br />
<br />

<ul id="courses">
    <?php foreach ($categories as $get_categories): ?>
        <li>
            <a href="<?php readable_text(url('course/index', array('course_id' => $get_categories))) ?>">
            <?php readable_text($get_categories); ?></a>
        </li>
    <?php endforeach; ?>
</ul>    


<center>
<!-- Index Table -->   
<table class="gridtable"> 
<!--<tr>
    <th> Course Name</th>
</tr>-->
<br />
<br />
 

<?php foreach ($courses as $get_courses): ?>
<tr>
    <td> <a href="<?php readable_text(url('course/view_course_details', array('trainee_id'=>$get_courses->trainee_id))) ?>">
        <?php readable_text($get_courses->name) ?> </a> </td>
</tr>
<?php endforeach; ?>


</table>
</center>

<style>
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

ul#courses
{
    padding: 0;
    text-align: center;
}

ul#courses li 
{
    display: inline;
}

ul#courses li a 
{
    background-color: #004566;
    color: white;
    padding: 5px 5px;
    text-decoration: none;
    border-radius: 2px 2px 0 0;
    text-align: center;
}

ul#courses li a:hover 
{
    color: black;
    background-color: lightgrey;
}
</style>
