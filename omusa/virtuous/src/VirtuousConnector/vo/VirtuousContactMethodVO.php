<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\VirtuousValueObject;

/**
 * Value Object for Contact Method items
 */
class VirtuousContactMethodVO extends VirtuousValueObject
{
    const TYPE_HOME_EMAIL = 'Home Email';
    const TYPE_HOME_PHONE = 'Home Phone';

    public $id;
    public $contactIndividualId;
    public $type;
    public $value;
    public $isOptedIn;
    public $isPrimary;
    public $canBePrimary = true;
    public $setAsPrimary;
}
