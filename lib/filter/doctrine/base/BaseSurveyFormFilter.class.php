<?php

/**
 * Survey filter form base class.
 *
 * @package    votingtool
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSurveyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'discription'         => new sfWidgetFormFilterInput(),
      'public_id'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'limit_ip'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'limit_location'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'limit_location_lat'  => new sfWidgetFormFilterInput(),
      'limit_location_long' => new sfWidgetFormFilterInput(),
      'limit_endtime'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'title'               => new sfValidatorPass(array('required' => false)),
      'discription'         => new sfValidatorPass(array('required' => false)),
      'public_id'           => new sfValidatorPass(array('required' => false)),
      'limit_ip'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'limit_location'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'limit_location_lat'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'limit_location_long' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'limit_endtime'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('survey_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Survey';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'title'               => 'Text',
      'discription'         => 'Text',
      'public_id'           => 'Text',
      'limit_ip'            => 'Boolean',
      'limit_location'      => 'Boolean',
      'limit_location_lat'  => 'Number',
      'limit_location_long' => 'Number',
      'limit_endtime'       => 'Date',
      'user_id'             => 'ForeignKey',
    );
  }
}
