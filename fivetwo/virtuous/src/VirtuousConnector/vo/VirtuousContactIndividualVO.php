<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\VirtuousValueObject;
use VirtuousConnector\vo\VirtuousContactMethodVO;

/**
 * Value Object for Contact Individual items
 */
class VirtuousContactIndividualVO extends VirtuousValueObject
{
    public $id;
    public $prefix;
    public $firstName;
    public $middleName;
    public $lastName;
    public $suffix;
    public $gender;
    public $isPrimary;
    public $canBePrimary = true;
    public $birthMonth;
    public $birthDay;
    public $birthYear;
    public $birthDate;
    public $approximateAge;
    public $isDeceased;
    public $passion;
    public $avatarUrl;
    /**
     * @var Array(VirtuousContactMethodVO) $contactMethods
     */
    public $contactMethods;
    public $createDateTimeUtc;
    public $modifiedDateTimeUtc;
    /**
     * @var Array $customFields
     */
    public $customFields;

    // Non native properties
    /**
     * @var VirtuousContactVO $contact
     */
    public $contact;


    /**
     * Get the first contact method of the matching type
     * @param string $type
     * @see VirtuousContactMethodVO type constants
     * @return VirtuousContactMethodVO or null $result;
     */
    public function getContactMethod($type)
    {
        $result = null;
        if (!empty($this->contactMethods)) {
            foreach($this->contactMethods as $item) {
                if ($item->type == $type) {
                    $result = new VirtuousContactMethodVO($item);
                    break;
                }
            }
        }
        return $result;
    }

    public function getAPIObject()
    {
        $this->exportFields = [
            'id',
            'prefix',
            'firstName',
            'middleName',
            'lastName',
            'suffix',
            'gender',
            'isPrimary',
            'canBePrimary',
            'birthMonth',
            'birthDay',
            'birthYear',
            'birthDate',
            'approximateAge',
            'isDeceased',
            'passion',
            'avatarUrl',
        ];
        $result = parent::getAPIObject();
        $result['contactMethods'] = $this->getContactMethodsAPIObject();
        $result['customFields'] = $this->getInnerAPIObjects($this->customFields);
        return $result;
    }

    private function getContactMethodsAPIObject()
    {
        $result = [];
        foreach ($this->contactMethods as $item) {
            array_push ($result, $item->getAPIObject());
        }
        return $result;
    }
}
