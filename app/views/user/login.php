<h1> Welcome to TC Records</h1>
<h5>Please log in to continue</h5>
<br />

<!--Checking: Username and Password Must Match-->
<?php if (!is_logged_in() && $user->username != '') : ?> 
    <div class="alert alert-error">
        <em><h4 class="alert-heading">Oops!</h4></em>
        <em>Invalid Username or Password</em>
    </div>
<?php endif  ?>

    <form class="form-horizontal">
    <form action="<?php readable_text(url('')) ?>" method="post">
    <div class="control-group">
    <label class="control-label" for ="username"><h4>Username</h4></label>
    <div class="controls">
    <input type="text" placeholder = "Username" name="username" value="<?php readable_text(Param::get('username')) ?>">
    </div>
    </div>
 
    <div class="control-group">
    <label class="control-label" for="password"><h4>Password</h4></label>
    <div class="controls">
    <input type="password" placeholder = "Password" name="password" value="<?php readable_text(Param::get('password')) ?>">
    </div>
    </div>
    <br />
 
<!--Successfully Logged In-->
    <div class="control-group">
    <div class="controls">
    <input type="hidden" name="page_next" value="login_end">
    <div class="span12">
    <button class="btn btn-info btn-medium" type="submit">Login</button>

    <br />
    <br /> 

If you don't have an account, register 
<a href="<?php readable_text(url('user/register')) ?>"> HERE</a>.
</div>
</div>
</div>

</form>