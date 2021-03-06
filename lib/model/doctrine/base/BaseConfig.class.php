<?php

/**
 * BaseConfig
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $ip_range_begin
 * @property string $ip_range_end
 * 
 * @method string getIpRangeBegin()   Returns the current record's "ip_range_begin" value
 * @method string getIpRangeEnd()     Returns the current record's "ip_range_end" value
 * @method Config setIpRangeBegin()   Sets the current record's "ip_range_begin" value
 * @method Config setIpRangeEnd()     Sets the current record's "ip_range_end" value
 * 
 * @package    votingtool
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseConfig extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('config');
        $this->hasColumn('ip_range_begin', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('ip_range_end', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}