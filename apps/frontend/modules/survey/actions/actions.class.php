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
  * Nur anzeigen der plain Survey Seite, das laden der Fragen dann durch J  S 
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
        
      $query = Doctrine_Core::getTable('survey')->createQuery('s')
      	->where('s.public_id = ? AND s.limit_endtime >= CURRENT_TIME()', $this->getVar('publicId'));
	  $survey = $query->fetchArray();
	       
      if (count($survey) == 1) {
      	  //var_dump($survey);
      	  $this->setVar('surveyTitle', $survey[0]['title']);
          $this->setVar('surveyDesc', $survey[0]['discription']);
          $this->setVar('surveyId', $survey[0]['id']);
      } else {
          $this->getUser()->setFlash('error', 'There is no survey with this id');
          $this->redirect('@survey');
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
  	  $this->setVar('surveyId', $request->getParameter("id", 0));
  	  $questions = null;
  	  while ( count($questions) < 1 ) {
  	  	$questionQuery = Doctrine_Core::getTable('question')->createQuery('q')
  	  	->where('q.survey_id = ?', $this->getVar('surveyId'));
	    $questions = $questionQuery->fetchArray();
  	  }
  	    	  
	  //Add Answers
	  foreach ($questions as &$question) {
  	      $answerQuery = Doctrine_Core::getTable('answer')->createQuery('a')
  	      	->where('a.question_id = ?', $question['id']);
	      $question['answers'] = $answerQuery->fetchArray();
	      $question['type'] = ($question['multichoice'] ? 'checkbox' : 'radio');
	      //= $this->newlineToHTMLBreak(
	  }
	  	  
	  $this->setVar('questionArray', $questions);
      //$result = json_encode($questions);
      //return $this->renderText($result);
       
	  
  	  return $this->renderPartial('survey/questionPartial');
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
