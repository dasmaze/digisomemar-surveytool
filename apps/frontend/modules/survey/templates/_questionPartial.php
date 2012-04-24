<?php foreach($questionArray as $question) { ?>
	<div>
	    <h3><?php echo $question['text'];  ?></h3>
	    <form>
	    <?php foreach($question['answers'] as $answer) { ?>
	        <input type="<?php echo $question['type'] ?>" 
	        name="<?php echo 'answer' . $question['id'] ?>" 
	        value="<?php echo $answer['id'] ?>"
	        class="answerForm">
	            <?php echo $answer['text'] ?>
	        </input>
	    <?php } ?>
	        <input type="submit" />
	    </form>
	</div>
<?php } ?>




