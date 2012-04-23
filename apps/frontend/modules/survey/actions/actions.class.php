<?php

/**
 * survey actions.
 *
 * @package    votingtool
 * @subpackage survey
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class surveyActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new SurveyIdForm();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->setVar('surveyId', $request->getParameter("surveyId", 0));
      
    if ($this->getVar('surveyId') == 0) {
        $this->getUser()->setFlash('error', 'You need to specify a survey id');
        $this->redirect('@survey');
    }
    
    $survey = Doctrine_Core::getTable('Survey')->find($this->surveyId);
    $this->setVar('surveyTitle', $survey->getTitle());
    
    parent::executeIndex($request);  
  }
}
