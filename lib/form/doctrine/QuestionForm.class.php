<?php

/**
 * Question form.
 *
 * @package    votingtool
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuestionForm extends BaseQuestionForm
{
  public function configure()
  {
      $this->validatorSchema->setOption('allow_extra_fields', true);
      
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'text'        => new sfWidgetFormInputText(),
      'discription' => new sfWidgetFormTextarea(),
      'multichoice' => new sfWidgetFormInputCheckbox(),
      'survey_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Survey'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'text'        => new sfValidatorString(array('max_length' => 255)),
      'discription' => new sfValidatorString(array('required' => false)),
      'multichoice' => new sfValidatorBoolean(array('required' => false)),
      'survey_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Survey'), 'required' => false)),
    ));
  }
}
