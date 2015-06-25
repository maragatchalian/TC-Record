<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TC Records</title>

    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/custom.css" rel="stylesheet">
    <style>
      body {
        padding-top: 80px;
      }
    </style>
  </head>

  <body>

  <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
  <div class="container">
    <a class="brand" href="index">TC Records</a>
    <?php if(isset($_SESSION["username"])):?>
    <p align="right">You are logged in as: <b><?php echo ($_SESSION["username"]); ?> </b> <br>
    <a href="<?php readable_text(url('user/logout'));?>">Logout</a></p>
    <?php endif?>
  </div>
  </div>
  </div>

    <div class="container">

 <?php if (isset($_SESSION['user_id'])) : ?>
  <ul class="nav">
    <li><a href="<?php readable_text(url('user/index')) ?>">Home</a></li>
    <li><a href="<?php readable_text(url('trainee/index')) ?>">Trainees</a></li>
    <li><a href="#">Courses</a></li>
    <li><a href="#">Exam Scores</a></li>
  </ul>
 <?php endif ?>
 
      <?php echo $_content_ ?>

    </div>

    <script>
    console.log(<?php readable_text(round(microtime(true) - TIME_START, 3)) ?> + 'sec');
    </script>

  </body>
</html>
