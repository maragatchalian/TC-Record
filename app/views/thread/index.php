<h1>All threads</h1>
        
<ul>
 <?php foreach ($threads as $v): ?>
  <a href="<?php readable_text(url("thread/view", array("thread_id" => $v->id))) ?>">
  <?php readable_text($v->title) ?></a>
  <?php endforeach ?>                     
</ul>