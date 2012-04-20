<?php

/**
 * Config filter form base class.
 *
 * @package    votingtool
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConfigFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ip_range_begin' => new sfWidgetFormFilterInput(),
      'ip_range_end'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'ip_range_begin' => new sfValidatorPass(array('required' => false)),
      'ip_range_end'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('config_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Config';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'ip_range_begin' => 'Text',
      'ip_range_end'   => 'Text',
    );
  }
}
