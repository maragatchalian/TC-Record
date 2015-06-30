<h3> Courses</h3>
<link href="/bootstrap/css/custom.css" rel="stylesheet">
<a class="btn btn-medium btn-info" href="<?php readable_text(url('course/add_course')) ?>">Add Course</a> <br />
<br />

<style>
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


  
<ul id="courses">
    <?php foreach ($categories as $get_categories): ?>
        <li>
            <a href="<?php readable_text(url('course/index', array('course_id' => $get_categories))) ?>">
            <?php readable_text($get_categories); ?></a>
        </li>
    <?php endforeach; ?>
</ul>    



<!-- Index Table -->    
<center>
<br />
<br />
<table class="gridtable">
<tr>
    <th> Sub Courses </th>
</tr>
</center>



<?php foreach ($courses as $get_from_trainee): ?>
<tr>
    <td> <?php readable_text($get_from_trainee->name) ?> </a> </td>
</tr>

<?php endforeach; ?>