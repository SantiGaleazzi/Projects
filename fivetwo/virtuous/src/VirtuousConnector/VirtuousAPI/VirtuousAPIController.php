<?php
namespace VirtuousConnector\VirtuousAPI;

use VirtuousConnector\vo\ResponseVO;
use VirtuousConnector\vo\VirtuousContactSearchVO;
use VirtuousConnector\vo\VirtuousContactVO;
use VirtuousConnector\vo\VirtuousContactAddressVO;
use VirtuousConnector\vo\VirtuousContactIndividualVO;
use VirtuousConnector\vo\VirtuousContactMethodVO;

class VirtuousAPIController
{
    /**
     * @var VirtuousContactVO $contact
     */
    public $contact;
    /**
     * @var VirtuousConnection $connection
     */
    public $connection;


    /**
     * Returns the given date in Atomic date format
     * @param mixed $date. Request date or, if null, current time
     * @return string
     */
    public static function getTimestamp ($date=null)
    {
        if (!$date) {
            $date = time();
        }
        return date(DATE_ATOM, $date);
    }

    public function connect ()
    {
        if (!$this->connection) {
            $this->connection = new VirtuousConnection ();
        }
        return $this->connection->isConnected();
    }

    /**
     * Finds or creates a contact
     * @param array $contactMatches = null
     * @return ResponseVO $response
     * @return VirtuousContactVO $response->content
     */
    public function processContact($contactMatches = null)
    {
        $response = new ResponseVO();
        if(!$this->connect()) {
            return $response;
        }
        if(!$contactMatches){
            $contactMatches = $this->findContact($this->contact->emailContactMethod->value);
        }
        if ($contactMatches) {
            $firstMatch = new VirtuousContactSearchVO($contactMatches[0]);
            $this->contact->id = $firstMatch->id;
            $this->contact->contactIndividualId = $firstMatch->contactIndividualId;
            $contactResponse = $this->connection->getContact($this->contact->id);
            $contactAddressResponse = $this->updateOrCreateContactAddress($contactResponse->content->address, $this->contact->address);
            $contactIndividualResponse = $this->connection->getContactIndividual($this->contact->contactIndividualId);
            $updatedContactIndividual = $this->contact->contactIndividuals[0];
            $updatedContactIndividual->customFields = $this->contact->customFields;
            $currentContactIndividual = $contactIndividualResponse->content;
            $this->updateContactIndividual($currentContactIndividual, $updatedContactIndividual);
            $response = $this->connection->getContact($this->contact->id);
        } else {
            $response = $this->connection->createContact($this->contact);
        }
        if ($response->success) {
            $contactTags = $this->contact->getTagsList();
            $this->contact = $response->content;
            if($contactTags) {
                $this->addContactTags($contactTags);
            }
        }
        return $response;
    }

    /**
     * Updates the address of a contact
     * @param VirtuousContactAddressVO $existingAddress
     * @param VirtuousContactAddressVO $updatedAddress
     * @return ResponseVO $response
     */
    public function updateOrCreateContactAddress($existingAddress, $updatedAddress)
    {
        if($existingAddress && $existingAddress->id) {
            return $this->updateContactAddress($existingAddress, $updatedAddress);
        } else {
            return $this->createContactAddress($updatedAddress);
        }
    }

    /**
     * Updates the address of a contact
     * @param VirtuousContactAddressVO $address
     * @return ResponseVO $response
     */
    public function createContactAddress($address)
    {
        if($address) {
            $address->contactId = $this->contact->id;
        }
        return $this->connection->createContactAddress($address);
    }

    /**
     * Updates the address of a contact
     * @param VirtuousContactAddressVO $existingAddress
     * @param VirtuousContactAddressVO $updatedAddress
     * @return ResponseVO $response
     */
    public function updateContactAddress($existingAddress, $updatedAddress)
    {
        if($existingAddress && $updatedAddress) {
            // Here we copy field values from the current item to the updated item
            $updatedAddress->id = $existingAddress->id;
        }
        return $this->connection->updateContactAddress($updatedAddress);
    }

    /**
     * Updates a contact individual information
     * @param VirtuousContactIndividualVO $currentContactIndividual
     * @param VirtuousContactIndividualVO $updatedContactIndividual
     * @return ResponseVO $response
     */
    public function updateContactIndividual($currentContactIndividual, $updatedContactIndividual)
    {
        if(!$updatedContactIndividual && !$currentContactIndividual) {
            return;
        }
        // Here we copy field values from the current item to the updated item
        $updatedContactIndividual->id = $currentContactIndividual->id;
        $response = $this->connection->updateContactIndividual($updatedContactIndividual);
        $updatedPhoneContactMethod = $updatedContactIndividual->getContactMethod(VirtuousContactMethodVO::TYPE_HOME_PHONE);
        $currentPhoneContactMethod = $currentContactIndividual->getContactMethod(VirtuousContactMethodVO::TYPE_HOME_PHONE);
        if($currentPhoneContactMethod) {
            $this->updateContactMethod($currentPhoneContactMethod, $updatedPhoneContactMethod);
        } else {
            $this->connection->createContactMethod($currentContactIndividual, $updatedPhoneContactMethod);
        }
    }

    public function updateContactMethod($currentPhoneContactMethod, $updatedPhoneContactMethod)
    {
        if($updatedPhoneContactMethod && $currentPhoneContactMethod) {
            $updatedPhoneContactMethod->id = $currentPhoneContactMethod->id;
        }
        return $this->connection->updateContactMethod($updatedPhoneContactMethod);
    }

    /**
     * Finds contact
     * @return ResponseVO $response
     * @return VirtuousContactVO $response->content
     */
    public function findContact($email)
    {
        $response = new ResponseVO();
        $result = false;
        if($this->connect()) {
           $response = $this->connection->findContacts($email);
           $result = $response->matches;
        }
        return $result;
    }

    /**
     * Adds each tag to the contact
     * @param array $
     */
    function addContactTags($contactTags)
    {
        $responses = [];
        foreach ($contactTags as $tag) {
            $matchingTag = $this->connection->findTag($tag);
            if($matchingTag->matches) {
                $responses[] = $this->connection->createContactTag($this->contact, $matchingTag->matches[0]->id);
            }
        }
        return $responses;
    }

}
