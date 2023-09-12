<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\VirtuousValueObject;

/**
 * Value Object for Virtuous user
 */
class VirtuousUserVO extends VirtuousValueObject
{
    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}