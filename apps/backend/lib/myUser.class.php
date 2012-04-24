<?php

class myUser extends sfBasicSecurityUser
{
    public function __construct($dispatcher, $storage) {
        sfForm::disableCSRFProtection();
        
        parent::__construct($dispatcher, $storage);
    }
}
