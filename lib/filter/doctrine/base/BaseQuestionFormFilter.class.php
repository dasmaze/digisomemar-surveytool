<?php

/**
 * Question filter form base class.
 *
 * @package    votingtool
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuestionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'text'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'discription' => new sfWidgetFormFilterInput(),
      'multichoice' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'survey_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Survey'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'text'        => new sfValidatorPass(array('required' => false)),
      'discription' => new sfValidatorPass(array('required' => false)),
      'multichoice' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'survey_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Survey'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('question_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Question';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'text'        => 'Text',
      'discription' => 'Text',
      'multichoice' => 'Boolean',
      'survey_id'   => 'ForeignKey',
    );
  }
}
