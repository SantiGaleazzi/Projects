<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\VirtuousValueObject;

/**
 * Value Object for items returned by Contact/Search
 */
class VirtuousContactSearchVO extends VirtuousValueObject
{
    public $individualId;
    public $id;
    public $name;
    /**
     * @var String $contactType
     * @see VirtuousContactVO::CONTACT_TYPE_* constants
     */
    public $contactType;
    public $contactName;
    public $address;
    public $email;
    public $phone;
    public $contactViewUrl;

    public function __get($property)
    {
        switch ($property) {
            case 'contactIndividualId':
                return $this->individualId;
        }
    }
}
