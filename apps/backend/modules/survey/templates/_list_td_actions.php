<td>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($survey, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($survey, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <li class="sf_admin_action_filter"><?php echo link_to("Show results", "results/" . $survey->getId()) ?></li>
  </ul>
</td>
