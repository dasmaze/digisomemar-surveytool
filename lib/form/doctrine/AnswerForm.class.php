<?php

/**
 * Answer form.
 *
 * @package    votingtool
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnswerForm extends BaseAnswerForm
{
  public function configure()
  {
      unset($this->widgetSchema['click_count']);
      $this->widgetSchema['question_id'] = new sfWidgetFormInputHidden();
      
      $this->validatorSchema['id'] = new sfValidatorPass();
      $this->validatorSchema['text'] = new sfValidatorPass();
  }
}
