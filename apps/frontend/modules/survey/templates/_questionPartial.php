<?php foreach($questionArray as $question) { ?>
	<div>
	    <h3><?php echo $question['text'];  ?></h3>
	    <form class="answerForm" onsubmit="submitForm();">
	    <?php foreach($question['answers'] as $answer) { ?>
	        <input type="<?php echo $question['type'] ?>" 
	        name="<?php echo 'answer' . $question['id'] ?>" 
	        value="<?php echo $answer['id'] ?>">
	            <?php echo $answer['text'] ?>
	        </input>
	    <?php } ?>
	        <input type="submit" class="submit-button"/>

	    </form>
	</div>
<?php } ?>




