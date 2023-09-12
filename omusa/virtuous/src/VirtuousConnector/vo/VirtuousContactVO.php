<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\ResponseVO;
use VirtuousConnector\vo\VirtuousValueObject;
use VirtuousConnector\vo\VirtuousContactMethodVO;
use VirtuousConnector\vo\VirtuousContactIndividualVO;

/**
 * Value Object for Contact items
 */
class VirtuousContactVO extends VirtuousValueObject
{
    const CONTACT_TYPE_HOUSEHOLD = 'Household';
    const CONTACT_TYPE_ORGANIZATION = 'Organization';

    // Non native properties
    public $prefix;
    public $suffix;
    public $firstName;
    public $lastName;
    public $contactIndividualId;

    // Native properties
    public $id;
    public $contactType = self::CONTACT_TYPE_HOUSEHOLD;
    public $isPrivate;
    public $informalName;
    public $description;
    public $website;
    public $anniversaryMonth;
    public $anniversaryDay;
    /**
     * @var VirtuousContactAddressVO $address
     */
    public $address;
    public $giftAskAmount;
    public $giftAskType;
    public $lifeToDateGiving;
    public $yearToDateGiving;
    public $lastGiftAmount;
    public $lastGiftDate;
    public $isCurrentUserFollowing;
    public $contactGiftsUrl;
    public $contactPassthroughGiftsUrl;
    public $contactPlannedGiftsUrl;
    public $contactPledgesUrl;
    public $contactImportantNotesUrl;
    public $contactNotesUrl;
    public $contactTagsUrl;
    public $contactRelationshipsUrl;
    public $primaryAvatarUrl;
    public $createDateTimeUtc;
    public $modifiedDateTimeUtc;
    /**
     * @var Array $customFields
     */
    public $customFields;
    public $referenceId;
    public $referenceSource;
    public $isArchived;
    public $originSegmentCode;

    // Properties mapped to third properties
    private $_name;
    /**
     * @property Array(VirtuousContactIndividualVO) $_contactIndividuals
     */
    private $_contactIndividuals;
    /**
     * @property Array(VirtuousContactIndividualVO) $_contactAddresses
     */
    private $_contactAddresses;
    /**
     * @property VirtuousContactMethodVO $emailContactMethod
     * This property is a shortcut to manage email contact method. Other contact methods must be added to the contactIndividuals items directly
     * @see VirtuousContactIndividualVO
     */
    private $_emailContactMethod;
    /**
     * @property VirtuousContactMethodVO $phoneContactMethod
     * This property is a shortcut to manage phone contact method. Other contact methods must be added to the contactIndividuals items directly
     * @see VirtuousContactIndividualVO
     */
    private $phoneContactMethod;
    /**
     * @var array $_tags. An array of strings. Each item is a tag for the current contact.
     */
    private $_tagsList;


    /**
     * Constructor method
     * @param mixed initialValues. An object or associative array to set the initial instance properties with
     */
    public function __construct($initialValues = null)
    {
        parent::__construct($initialValues);
        if ($this->address) {
            $this->address = new VirtuousContactAddressVO($this->address);
        }
    }

    public function __get ($property)
    {
        switch ($property) {
            case 'name':
                if (!$this->_name) {
                    // If no custom name is given, set full contact name
                    $this->_name = "{$this->firstName} {$this->lastName}";
                }
                return $this->_name;
                break;
            case 'contactIndividuals':
                // If contact individuals list is empty, appends on the fly a VirtuousContactIndividualVO
                if (empty($this->_contactIndividuals)) {
                    $this->_contactIndividuals = [
                        new VirtuousContactIndividualVO ([
                            'id' => $this->contactIndividualId,
                            'prefix' => $this->prefix,
                            'suffix' => $this->suffix,
                            'firstName' => $this->firstName,
                            'lastName' => $this->lastName,
                            'isPrimary' => true,
                            'contact' => $this,
                        ])
                    ];
                }
                // Adds the shortcut emailContactMethod to the first contact individual item
                if (empty($this->_contactIndividuals[0]->contactMethods)) {
                    $this->_contactIndividuals[0]->contactMethods = [
                        $this->emailContactMethod
                    ];
                    if (!empty ($this->phoneContactMethod)) {
                        $this->_contactIndividuals[0]->contactMethods[] = $this->phoneContactMethod;
                    }
                }
                return $this->_contactIndividuals;
                break;
            case 'contactAddresses':
                if (empty($this->_contactAddresses)) {
                    $this->_contactAddresses = [
                        $this->address
                    ];
                }
                return $this->_contactAddresses;
                break;
            case 'emailContactMethod':
                if (empty($this->_emailContactMethod)) {
                    $this->_emailContactMethod = $this->resolveContactMethod(VirtuousContactMethodVO::TYPE_HOME_EMAIL);
                }
                return $this->_emailContactMethod;
                break;
            case 'phoneContactMethod':
                if (empty($this->phoneContactMethod)) {
                    $this->phoneContactMethod = $this->resolveContactMethod(VirtuousContactMethodVO::TYPE_HOME_PHONE);
                }
                return $this->phoneContactMethod;
                break;
            default:
                $privateProperty = "_$property";
                if (property_exists ($this, $privateProperty)) {
                    return $this->$privateProperty;
                }
        }
    }

    public function __set ($property, $value)
    {
        // Attempts to map an existing private property with "_propery" pattern name
        $privateProperty = "_$property";
        if (property_exists ($this, $privateProperty)) {
            $this->$privateProperty = $value;
        } else {
            // Creates a dynamic property
            $this->$property = $value;
        }
    }

    public function createCustomField($name, $value, $type=VirtuousCustomFieldVO::DATA_TYPE_TEXT)
    {
        if (!$this->customFields) {
            $this->customFields = [];
        }
        $this->customFields[$name] = $value;
    }

    public function updateCustomField($name, $value, $type=VirtuousCustomFieldVO::DATA_TYPE_TEXT)
    {
        $this->customFields[] = new VirtuousCustomFieldVO([
            'type'  => $type,
            'name'  => $name,
            'value' => $value
        ]);
    }

    /**
     * Looks for a contact method of the given type, in the first contact individual and returns its value
     * @param string $type
     * @see VirtuousContactMethodVO type constants
     * @return VirtuousContactMethodVO or null $result;
     */
    public function resolveContactMethod($type)
    {
        $result = null;
        if (!empty($this->contactIndividuals[0])) {
            $result = $this->contactIndividuals[0]->getContactMethod($type);
        }
        return $result;
    }

    public function getAPIObject()
    {
        $this->exportFields = [
            'id',
            'referenceId',
            'referenceSource',
            'contactType',
            'name',
            'informalName',
            'description',
            'website',
            'anniversaryMonth',
            'anniversaryDay',
            'originSegmentCode',
        ];
        $result = parent::getAPIObject();
        $result['contactIndividuals'] = $this->getContactIndividualsAPIList();
        $addressInfo = $this->getContactAddressesAPIList();
        if($addressInfo) {
            $result['contactAddresses'] = $addressInfo;
        }
        return $result;
    }

    /*private function haveCustomFields()
    {
        return !empty($this->customFields);
    }*/

    public function getCustomFieldsAPIList()
    {
        return $this->getInnerAPIObjects($this->customFields);
    }

    public function getContactIndividualsAPIList()
    {
        $result = $this->getInnerAPIObjects($this->contactIndividuals);
        $result[0]['customFields'] = $this->customFields;
        if(!$result[0]['customFields']) {
            unset($result[0]['customFields']);
        }
        $this->customFields = [];

        return $result;
    }

    public function getContactAddressesAPIList()
    {
        return $this->getInnerAPIObjects($this->contactAddresses);
    }

    /**
     * Returns the $_tagsList property
     * @return array
     */
    public function getTagsList()
    {
        $this->initializeTagsList();
        return $this->_tagsList;
    }

    /**
     * Sets the $_tagsList property, if the given argument is an array
     * @param array $tags
     */
    public function setTagsList($tags)
    {
        if(is_array($tags)) {
            $this->_tagsList = $tags;
        }
    }

    /**
     * Adds the given tag from $_tagsList property
     * @param string $tag
     */
    public function addTag($tag)
    {
        $this->initializeTagsList();
        if(!in_array($tag, $this->_tagsList)) {
            $this->_tagsList[] = $tag;
        }
    }

    /**
     * Attempts to remove the given tag from $_tagsList property, if it contains the given tag
     * @param string $tag
     */
    public function removeTag($tag)
    {
        $this->initializeTagsList();
        $match = in_array($tag, $this->_tagsList);
        if($match !== false) {
            array_slice($this->_tagsList, $match, 1);
        }
    }

    /**
     * Resets the $_taglist property to an empty array
     */
    public function clearTags()
    {
        $this->_tagsList = [];
    }

    /**
     * Sets $_tagslist property to an empty array if it has not been set yet.
     */
    private function initializeTagsList()
    {
        if($this->_tagsList == null) {
            $this->_tagsList = [];
        }
    }

}
