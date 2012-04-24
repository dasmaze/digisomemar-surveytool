<?php

require_once dirname(__FILE__).'/../lib/surveyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/surveyGeneratorHelper.class.php';

/**
 * survey actions.
 *
 * @package    votingtool
 * @subpackage survey
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class surveyActions extends autoSurveyActions
{
  public function executeResults(sfWebRequest $request)
  {
      $this->surveyId = $request->getParameter('id');
      $this->survey = Doctrine_Core::getTable('Survey')->find($this->surveyId);
      $this->questions = $this->survey->getQuestions();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $data = $request->getParameter($form->getName());

    $form_data = $form->getObject()->getData();
    $public_id = $form_data['public_id'];

    if (!isset($public_id) || $public_id instanceof Doctrine_Null) {
        $data['public_id'] = rand(1000, 9999);
    } else {
        $data['public_id'] = $public_id;
    }

    $duration = $request->getParameter('duration');
    if (!empty($duration)) {
        $duration_unit = $request->getParameter('duration_unit');
        $duration_s = time();
        var_dump($duration_s);
        switch($duration_unit) {
            case 0: $duration_s += $duration * 60; break;
            case 1: $duration_s += $duration * 3600; break;
            case 2: $duration_s += $duration * 3600 * 24; break;
        }

        $year = date('Y', $duration_s);
        $month = date('m', $duration_s);
        $day = date('d', $duration_s);
        $hour= date('H', $duration_s);
        $minute = date('i', $duration_s);
        $data['limit_endtime']['year'] = $year;
        $data['limit_endtime']['month'] = $month;
        $data['limit_endtime']['day'] = $day;
        $data['limit_endtime']['hour'] = $hour;
        $data['limit_endtime']['minute'] = $minute;
    }

    if ($data['limit_location'] == 'on') {
        // TODO: Get and save the location the survey is limited to
        $data['limit_location_lat'] = 0;
        $data['limit_location_long'] = 0;
    }

    $form->bind($data, $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The survey with public ID ' . $data['public_id'] . ' was created successfully.' : 'The survey with public ID ' . $data['public_id'] . ' was updated successfully.';

      try {
        $survey = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $survey)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@survey_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'survey_edit', 'sf_subject' => $survey));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
