<?php

/**
 * BaseQuestion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $text
 * @property clob $discription
 * @property boolean $multichoice
 * @property integer $survey_id
 * @property Survey $Survey
 * @property Doctrine_Collection $Answers
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getText()        Returns the current record's "text" value
 * @method clob                getDiscription() Returns the current record's "discription" value
 * @method boolean             getMultichoice() Returns the current record's "multichoice" value
 * @method integer             getSurveyId()    Returns the current record's "survey_id" value
 * @method Survey              getSurvey()      Returns the current record's "Survey" value
 * @method Doctrine_Collection getAnswers()     Returns the current record's "Answers" collection
 * @method Question            setId()          Sets the current record's "id" value
 * @method Question            setText()        Sets the current record's "text" value
 * @method Question            setDiscription() Sets the current record's "discription" value
 * @method Question            setMultichoice() Sets the current record's "multichoice" value
 * @method Question            setSurveyId()    Sets the current record's "survey_id" value
 * @method Question            setSurvey()      Sets the current record's "Survey" value
 * @method Question            setAnswers()     Sets the current record's "Answers" collection
 * 
 * @package    votingtool
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuestion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('question');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('text', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('discription', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('multichoice', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('survey_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Survey', array(
             'local' => 'survey_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Answer as Answers', array(
             'local' => 'id',
             'foreign' => 'question_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}