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
  * Nothing to do at the moment here
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new SurveyIdForm();
  }
  
  /**
  * Nur anzeigen der plain Survey Seite, das laden der Fragen dann durch JS 
  * 
  * gets: GET with the public surveyID
  * 
  * gives away: surveyID, title, discription 
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
      $this->setVar('publicId', $request->getParameter("publicId", 0));
      if ($this->getVar('publicId') == 0) {
          $this->getUser()->setFlash('error', 'You need to specify a public survey id');
          $this->redirect('@survey');
      }
        
      $query = Doctrine_Core::getTable('survey')->createQuery('s')->where('s.public_id = ?', $this->getVar('publicId'));
	  $survey = $query->execute();
	       
      if (count($survey) == 1) {
      	  //var_dump($survey);
      	  $this->setVar('surveyTitle', $survey[0]->getTitle());
          $this->setVar('surveyDesc', $survey[0]->getDiscription());
          $this->setVar('surveyId', $survey[0]->getId());
      }
  }
  
  /**
  * gets: surveyID, position (optional)	
  * 
  * gives away: json (see README.txt)
  *
  * @param sfRequest $request A request object
  */
  public function executeShowQuestions(sfWebRequest $request)
  {
  	
  }
  
  /**
  * gets: ??
  * 
  * gives away: ??
  *
  * @param sfRequest $request A request object
  */
  public function executeSubmitQuestionAnswer(sfWebRequest $request)
  {
  }
}
