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
      
        if ($this->getVar('surveyId') == 0) {
            $this->getUser()->setFlash('error', 'You need to specify a survey id');
            $this->redirect('@survey');
        }
        
        $survey = Doctrine_Core::getTable('Survey')->find($this->surveyId);
        $this->setVar('surveyTitle', $survey->getTitle());
        
        parent::executeIndex($request);  
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
