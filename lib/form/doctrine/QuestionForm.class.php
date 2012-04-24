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
  
  /**
   * Embeds a sfForm into the current form n times.
   *
   * @param string  $name             The field name
   * @param array   $form             sfForms
   * @param integer $n                The number of times to embed the form
   * @param string  $decorator        A HTML decorator for the main form around embedded forms
   * @param string  $innerDecorator   A HTML decorator for each embedded form
   * @param array   $options          Options for schema
   * @param array   $attributes       Attributes for schema
   * @param array   $labels           Labels for schema
   */
  public function embedFormsForEach($name, $forms, $n, $decorator = null, $innerDecorator = null, $options = array(), $attributes = array(), $labels = array())
  {
    if (true === $this->isBound() || true === $forms[0]->isBound())
    {
      throw new LogicException('A bound form cannot be embedded');
    }

    $this->embeddedForms[$name] = new sfForm();

    //unset($form[self::$CSRFFieldName]);

    $widgetSchema = $forms[0]->getWidgetSchema();

    // generate default values
    $defaults = array();
    for ($i = 0; $i < $n; $i++)
    {
      $defaults[$i] = $forms[$i]->getDefaults();

      $this->embeddedForms[$name]->embedForm($i, $forms[0]);
    }

    $this->setDefault($name, $defaults);

    $decorator = null === $decorator ? $widgetSchema->getFormFormatter()->getDecoratorFormat() : $decorator;
    $innerDecorator = null === $innerDecorator ? $widgetSchema->getFormFormatter()->getDecoratorFormat() : $innerDecorator;

    $this->widgetSchema[$name] = new sfWidgetFormSchemaDecorator(new sfWidgetFormSchemaForEach(new sfWidgetFormSchemaDecorator($widgetSchema, $innerDecorator), $n, $options, $attributes), $decorator);
    $this->validatorSchema[$name] = new sfValidatorSchemaForEach($forms[0]->getValidatorSchema(), $n);

    // generate labels
    for ($i = 0; $i < $n; $i++)
    {
      if (!isset($labels[$i]))
      {
        $labels[$i] = sprintf('%s (%s)', $this->widgetSchema->getFormFormatter()->generateLabelName($name), $i);
      }
    }

    $this->widgetSchema[$name]->setLabels($labels);

    $this->resetFormFields();
  }
}
