<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
    <?php if ('NONE' != $fieldset): ?>
        <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
    <?php endif; ?>

    <?php if ($form['public_id']->getValue() != null): ?>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_title">
            <label>Survey ID</label>
            <div class="content">
                <?php echo $form['public_id']->getValue() ?>
            </div>
        </div>
    <?php endif; ?>

    <?php foreach ($fields as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
        <?php include_partial('survey/form_field', array(
        'name'       => $name,
        'attributes' => $field->getConfig('attributes', array()),
        'label'      => $field->getConfig('label'),
        'help'       => $field->getConfig('help'),
        'form'       => $form,
        'field'      => $field,
        'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
        )) ?>
    <?php endforeach; ?>
    
    <?php if ($form['limit_endtime']->getValue() != null): ?>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_title">
            <label>End of the survey</label>
            <div class="content">
                <?php echo $form['limit_endtime']->getValue() ?>
            </div>
        </div>
    <?php endif; ?>
        
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_title">
        <label>Duration</label>
        <div class="content">
            <input type="text" name="duration" />
            <select name="duration_unit" />
                <option value="0" selected="selected">Minutes</option>
                <option value="1">Hours</option>
                <option value="2">Days</option>
            </select>
        </div>
    </div>
</fieldset>