<div class="alert alert-error"><?php echo $sf_user->getFlash('error') ?></div>
<form action="<?php echo url_for('survey/show') ?>" method="GET">
    <?php echo $form ?>
    <input type="submit" />
</form>
