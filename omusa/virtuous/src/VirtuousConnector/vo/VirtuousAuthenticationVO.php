<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\VirtuousValueObject;

class VirtuousAuthenticationVO extends VirtuousValueObject
{
    const TOKEN_TYPE_BEARER = 'bearer';

    public $access_token;
    public $refresh_token;
    public $token_type;
    public $expires_in;
    public $userName;
    public $twoFactorEnabled;
    public $issued;
    public $expires;

    public function __set ($property, $value)
    {
        switch ($property) {
            case '.issued':
                $this->issued = $value;
                break;
            case '.expires':
                $this->expires = $value;
                break;
        }
    }
}
