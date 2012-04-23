<?php 
class SurveyIdForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'publicId'    => new sfWidgetFormInput(),
    ));
  }
}
?>
