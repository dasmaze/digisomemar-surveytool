<div id="sf_admin_container">
  <div id="sf_admin_footer">
    <?php foreach ($questions as $question): ?>
    <?php include_partial('survey/results_question', array('question' => $question)) ?>
    <?php endforeach ?>
  </div>
</div>
