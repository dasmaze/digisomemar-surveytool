<?php

/**
 * User filter form base class.
 *
 * @package    votingtool
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'login' => new sfWidgetFormFilterInput(),
      'pass'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'login' => new sfValidatorPass(array('required' => false)),
      'pass'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'login' => 'Text',
      'pass'  => 'Text',
    );
  }
}
