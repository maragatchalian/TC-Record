<h3> 
	<?php readable_text($user['first_name']);?>
	<?php readable_text($user['last_name']);?>
</h3>

<div class="avatar-big float-left">
<img src='' width="200" height="200" align="left" class="img-rounded" />
</div>

<br />
<div class="float-right user-details">
<b>Username: </b>  <?php readable_text($user['username']);?> <br />
<b>Last Name: </b>  <?php readable_text($user['last_name']);?> <br />
<b>First Name: </b>  <?php readable_text($user['first_name']);?> <br />
<b>Email: </b>  <?php readable_text($user['email']);?> <br />
<b>User Type: </b>  <?php readable_text($user['user_type']);?> <br />
<b>Member Since: </b>  <?php readable_text($user['registered']);?> <br />
<br /><br />

<a class="btn btn-medium btn-info" href="<?php readable_text(url('trainee/edit_trainee', array('trainee_id' => $trainee_id))) ?>">Edit Profile</a>
</div>
<a class="btn btn-medium btn-info" href="">Change Photo</a>

