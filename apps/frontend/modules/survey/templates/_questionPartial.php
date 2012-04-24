<?php foreach($questionArray as $question) { ?>
	<div>
	    <h3><?php echo $question['text'];  ?></h3>
	    <form id="question<?php echo $question['id'];  ?>" onsubmit="return submitForm('question<?php echo $question['id'];?>');">
	    <?php foreach($question['answers'] as $answer) { ?>
	        <input type="<?php echo $question['type'] ?>" 
	        name="<?php echo 'answer' . $question['id'] ?>" 
	        value="<?php echo $answer['id'] ?>">
	            <?php echo $answer['text'] ?>
	        </input>
	    <?php } ?>
	        <!--input type="hidden" name="timestamp" value="<?php echo $question['created_at'] ?>" /-->
	        <input type="submit" class="submit-button"/>
	    </form>
	</div>
<?php } ?>




