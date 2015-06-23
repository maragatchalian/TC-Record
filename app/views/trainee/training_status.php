Filter by Training Status
<ul>
    <?php foreach ($trainees as $get_trainee): ?>
    	<li>
    		<a href="<?php readable_text(url('trainee/index', array('trainee_id' => $get_trainee->training_status))) ?>"> 
    		<?php readable_text($get_trainee); ?></a>
    	</li>
    <?php endforeach; ?>
</font>
</ul>