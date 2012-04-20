<?php

/**
 * Survey form base class.
 *
 * @method Survey getObject() Returns the current form's model object
 *
 * @package    votingtool
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSurveyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'title'               => new sfWidgetFormInputText(),
      'discription'         => new sfWidgetFormTextarea(),
      'public_id'           => new sfWidgetFormInputText(),
      'limit_ip'            => new sfWidgetFormInputCheckbox(),
      'limit_location_lat'  => new sfWidgetFormInputText(),
      'limit_location_long' => new sfWidgetFormInputText(),
      'limit_endtime'       => new sfWidgetFormDateTime(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'               => new sfValidatorString(array('max_length' => 255)),
      'discription'         => new sfValidatorString(array('required' => false)),
      'public_id'           => new sfValidatorString(array('max_length' => 16)),
      'limit_ip'            => new sfValidatorBoolean(array('required' => false)),
      'limit_location_lat'  => new sfValidatorNumber(array('required' => false)),
      'limit_location_long' => new sfValidatorNumber(array('required' => false)),
      'limit_endtime'       => new sfValidatorDateTime(array('required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('survey[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Survey';
  }

}
