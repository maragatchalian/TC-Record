<html>
<font color = "black">
<center>
<h3>Hey Gorgeous, <?php readable_text($user->username) ?>!</h3>
</center>
<p class="alert alert-success">
You have successfully created an account. 
</p>

<a href="<?php readable_text(url('user/login')) ?>"> Log in here </a> 
</font>
</html>