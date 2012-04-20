<?php

/**
 * Answer filter form base class.
 *
 * @package    votingtool
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnswerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'text'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'click_count' => new sfWidgetFormFilterInput(),
      'question_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Question'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'text'        => new sfValidatorPass(array('required' => false)),
      'click_count' => new sfValidatorPass(array('required' => false)),
      'question_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Question'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('answer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Answer';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'text'        => 'Text',
      'click_count' => 'Text',
      'question_id' => 'ForeignKey',
    );
  }
}
