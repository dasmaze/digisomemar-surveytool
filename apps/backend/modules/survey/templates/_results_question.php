<table>
<th> <?php echo $question->getText() ?> </th>
<?php foreach ($question->getAnswers() as $answer): ?>
<tr> <?php include_partial('survey/results_answer', array('answer' => $answer)) ?> </tr>
<?php endforeach ?>
</table>
