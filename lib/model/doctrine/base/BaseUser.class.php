<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $login
 * @property string $pass
 * @property Doctrine_Collection $Survey
 * 
 * @method integer             getId()     Returns the current record's "id" value
 * @method string              getLogin()  Returns the current record's "login" value
 * @method string              getPass()   Returns the current record's "pass" value
 * @method Doctrine_Collection getSurvey() Returns the current record's "Survey" collection
 * @method User                setId()     Sets the current record's "id" value
 * @method User                setLogin()  Sets the current record's "login" value
 * @method User                setPass()   Sets the current record's "pass" value
 * @method User                setSurvey() Sets the current record's "Survey" collection
 * 
 * @package    votingtool
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('login', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('pass', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Survey', array(
             'local' => 'id',
             'foreign' => 'user_id'));
    }
}