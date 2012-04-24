<?php foreach($questionArray as $question) { ?>
	<h3><?php echo $question['text'];  ?></h3>
	<?php foreach($question['answers'] as $answer) { ?>
	    <input type="<?php echo $question['type'] ?>" name="<?php echo $answer['text'] ?>" value="<?php echo $answer['id'] ?>">
	        <?php echo $answer['text'] ?>
	    </input>
	<?php } ?>
<?php } ?>




