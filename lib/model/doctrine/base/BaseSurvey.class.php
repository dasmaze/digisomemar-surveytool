<?php

/**
 * BaseSurvey
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property clob $discription
 * @property string $public_id
 * @property boolean $limit_ip
 * @property boolean $limit_location
 * @property float $limit_location_lat
 * @property float $limit_location_long
 * @property timestamp $limit_endtime
 * @property integer $user_id
 * @property User $User
 * @property Doctrine_Collection $Questions
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method string              getTitle()               Returns the current record's "title" value
 * @method clob                getDiscription()         Returns the current record's "discription" value
 * @method string              getPublicId()            Returns the current record's "public_id" value
 * @method boolean             getLimitIp()             Returns the current record's "limit_ip" value
 * @method boolean             getLimitLocation()       Returns the current record's "limit_location" value
 * @method float               getLimitLocationLat()    Returns the current record's "limit_location_lat" value
 * @method float               getLimitLocationLong()   Returns the current record's "limit_location_long" value
 * @method timestamp           getLimitEndtime()        Returns the current record's "limit_endtime" value
 * @method integer             getUserId()              Returns the current record's "user_id" value
 * @method User                getUser()                Returns the current record's "User" value
 * @method Doctrine_Collection getQuestions()           Returns the current record's "Questions" collection
 * @method Survey              setId()                  Sets the current record's "id" value
 * @method Survey              setTitle()               Sets the current record's "title" value
 * @method Survey              setDiscription()         Sets the current record's "discription" value
 * @method Survey              setPublicId()            Sets the current record's "public_id" value
 * @method Survey              setLimitIp()             Sets the current record's "limit_ip" value
 * @method Survey              setLimitLocation()       Sets the current record's "limit_location" value
 * @method Survey              setLimitLocationLat()    Sets the current record's "limit_location_lat" value
 * @method Survey              setLimitLocationLong()   Sets the current record's "limit_location_long" value
 * @method Survey              setLimitEndtime()        Sets the current record's "limit_endtime" value
 * @method Survey              setUserId()              Sets the current record's "user_id" value
 * @method Survey              setUser()                Sets the current record's "User" value
 * @method Survey              setQuestions()           Sets the current record's "Questions" collection
 * 
 * @package    votingtool
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSurvey extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('survey');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('discription', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('public_id', 'string', 16, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 16,
             ));
        $this->hasColumn('limit_ip', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('limit_location', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('limit_location_lat', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('limit_location_long', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('limit_endtime', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Question as Questions', array(
             'local' => 'id',
             'foreign' => 'survey_id'));
    }
}