<?php if($sf_user->hasFlash('error')): ?>
    <div class="alert alert-error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>
<h2><?php echo $surveyTitle ?></h2>
<p><?php echo $surveyDesc ?></p>
