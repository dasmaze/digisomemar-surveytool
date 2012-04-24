<table style="width: 350px;">
<th colspan="4"> <?php echo $question->getText() ?> </th>

<?php $votes = 0 ?>
<?php foreach ($question->getAnswers() as $answer): ?>
<?php $votes += $answer->getClickCount() ?>
<?php endforeach ?>

<?php foreach ($question->getAnswers() as $answer): ?>
<tr> <?php include_partial('survey/results_answer', array('answer' => $answer, 'votes' => $votes)) ?> </tr>
<?php endforeach ?>
</table>
