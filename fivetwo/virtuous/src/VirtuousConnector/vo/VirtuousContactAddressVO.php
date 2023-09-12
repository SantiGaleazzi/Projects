<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\VirtuousValueObject;

/**
 * Value Object for Contact address items
 */
class VirtuousContactAddressVO extends VirtuousValueObject
{
    const LABEL_PRIMARY = 'Primary';

    public $contactId;
    public $id;
    public $label;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $postal;
    public $country;
    public $isPrimary;
    public $canBePrimary = true;
    public $startMonth;
    public $startDay;
    public $endMonth;
    public $endDay;

    public function __get($property)
    {
        switch ($property) {
            case 'countryCode':
                return $this->country;
                break;
        }
    }

    public function __set($property, $value)
    {
        switch ($property) {
            case 'countryCode':
                $this->country = $value;
                break;
        }
    }

}
