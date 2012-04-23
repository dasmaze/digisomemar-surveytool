<?php if($sf_user->hasFlash('error')): ?>
    <div class="alert alert-error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>
<form action="<?php echo url_for('survey/show') ?>" method="GET">
    <label for="publicId">Survey ID</label><input name="publicId" type="text" size="16" maxlength="16" />
    <input type="submit" />
</form>
