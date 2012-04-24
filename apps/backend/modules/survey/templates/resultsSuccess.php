<?php use_helper('I18N', 'Date') ?>
<?php include_partial('survey/assets') ?>

<h1>Survey results for <?php echo $survey->getTitle() ?></h1>
<br />
<div id="sf_admin_container">
    <?php foreach ($questions as $question): ?>
    <?php include_partial('survey/results_question', array('question' => $question)) ?>
    <?php endforeach ?>
</div>

<?php echo link_to("Back to surveys", "@survey") ?>
