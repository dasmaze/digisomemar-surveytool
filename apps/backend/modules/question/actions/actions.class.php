<?php

require_once dirname(__FILE__).'/../lib/questionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/questionGeneratorHelper.class.php';

/**
 * question actions.
 *
 * @package    votingtool
 * @subpackage question
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questionActions extends autoQuestionActions
{    
    public function executeIndex(sfWebRequest $request)
    {
        $this->setVar('surveyId', $request->getParameter("survey_id", 0));
      
        if ($this->surveyId == 0) {
            if (!$this->surveyId = $this->getUser()->getAttribute('currentSurveyId')) {
                $this->getUser()->setFlash('error', 'You need to specify a survey id');
                $this->redirect('@survey');
            }
        }
        
        $this->getUser()->setAttribute('currentSurveyId', $this->surveyId);
        
        $survey = Doctrine_Core::getTable('Survey')->find($this->surveyId);
        $this->setVar('surveyTitle', $survey->getTitle());
        
        parent::executeIndex($request);  
    } 
    
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $data = $request->getParameter($form->getName());
      $data['survey_id'] = $this->getUser()->getAttribute('currentSurveyId');
      
      $form->bind($data, $request->getFiles($form->getName()));
       
    if ($data['survey_id'] && $form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $question = $form->save();
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $question)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@question_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'question_edit', 'sf_subject' => $question));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
    
  protected function getPager()
  {
    $pager = $this->configuration->getPager('Question');
    $q = $this->buildQuery();
    $q->andWhere('survey_id=' . $this->getVar('surveyId'));
    $pager->setQuery($q);
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }
  
  
}
