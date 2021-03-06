<?php

/**
 * BaseAnswer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $text
 * @property int $click_count
 * @property integer $question_id
 * @property Question $Question
 * 
 * @method integer  getId()          Returns the current record's "id" value
 * @method string   getText()        Returns the current record's "text" value
 * @method int      getClickCount()  Returns the current record's "click_count" value
 * @method integer  getQuestionId()  Returns the current record's "question_id" value
 * @method Question getQuestion()    Returns the current record's "Question" value
 * @method Answer   setId()          Sets the current record's "id" value
 * @method Answer   setText()        Sets the current record's "text" value
 * @method Answer   setClickCount()  Sets the current record's "click_count" value
 * @method Answer   setQuestionId()  Sets the current record's "question_id" value
 * @method Answer   setQuestion()    Sets the current record's "Question" value
 * 
 * @package    votingtool
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAnswer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('answer');
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
        $this->hasColumn('click_count', 'int', null, array(
             'type' => 'int',
             'default' => 0,
             ));
        $this->hasColumn('question_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Question', array(
             'local' => 'question_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}