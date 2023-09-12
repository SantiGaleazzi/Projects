<?php
namespace VirtuousConnector\VirtuousAPI;

use VirtuousConnector\vo\ResponseVO;
use VirtuousConnector\vo\VirtuousUserVO;
use VirtuousConnector\vo\VirtuousContactSearchVO;
use VirtuousConnector\vo\VirtuousContactVO;
use VirtuousConnector\vo\VirtuousContactAddressVO;
use VirtuousConnector\vo\VirtuousContactIndividualVO;
use VirtuousConnector\vo\VirtuousContactMethodVO;
use VirtuousConnector\vo\VirtuousAuthenticationVO;

global $username;
$username = get_field('user_virtuous', 'option');
global $password;
$password = get_field('password_virtuous', 'option');

class VirtuousConnection {
    const VIRTUOUS_API_URL            = 'https://api.virtuoussoftware.com';

    const API_CONTACT_INDIVIDUAL = 'ContactIndividual';
    const API_CONTACT            = 'Contact';
    const API_CONTACT_ADDRESS    = 'ContactAddress';
    const API_CONTACT_SEARCH     = 'Contact/Search';
    const API_CONTACT_METHOD     = 'ContactMethod';
    const API_CONTACT_TAG        = 'ContactTag';
    const API_TAG_SEARCH         = 'Tag/Search';

    const ACTION_GET       = 'GET';
    const ACTION_POST      = 'POST';
    const ACTION_DELETE    = 'DELETE';
    const ACTION_PUT       = 'PUT';

    const RESPONSE_CODE_OK = 200;

    /**
     * Virtuous credentials
     * @var VirtuousUserVO $apiUser
     */
    //public static $apiUser;

    private $authentication;

    public static function isEnabled()
    {
        return !empty(VirtuousConnection::$apiUser);
    }

    public function __construct ()
    {
        $connectionResult = $this->connect();
        if (!$connectionResult->success) {
            error_log("Error connecting with Virtuous API", 0);
        }
    }

    /**
     * Returns true if the authentication property has an access token
     * @return bool
     */
    public function isConnected()
    {
        return $this->authentication && $this->authentication->access_token;
    }

    /**
     * Request a contact by ID
     * @param int $contactId
     * @return ResponseVO
     */
    public function getContact ($contactId)
    {
        $response = $this->makeAPICall (self::ACTION_GET, self::API_CONTACT."/$contactId");
        if ($response->success) {
            $response->content = new VirtuousContactVO($response->content);
        }
        return $response;
    }

    /**
     * Creates a Virtuous Contact
     * @param VirtuousContactVO $contact
     * @return ResponseVO $response
     * @return VirtuousContactVO $response->content
     */
    public function createContact (VirtuousContactVO $contact)
    {
        $requestBody = $contact->getAPIObject();
        $result = $this->makeAPICall(self::ACTION_POST, self::API_CONTACT, $requestBody);
        if ($result->success) {
            $result->content = new VirtuousContactVO($result->content);
        }
        return $result;
    }

    /**
     * Creates a contact tag
     * @param VirtuousContactVO $contact
     * @param int $tagId
     * @return ResponseVO $response
     */
    public function createContactTag(VirtuousContactVO $contact, $tagId)
    {
        $result = new ResponseVO();
        if($contact->id && $tagId) {
            $requestBody = [
                'tagId'      => $tagId,
                'contactId' => $contact->id,
            ];
            $result = $this->makeAPICall (self::ACTION_POST, self::API_CONTACT_TAG, $requestBody);
        }
        return $result;
    }

    /**
     * Creates a contact address
     * @param VirtuousContactAddressVO $address
     * @return ResponseVO $response
     */
    public function createContactAddress($address)
    {
        $result = new ResponseVO();
        if($address) {
            $requestBody = $address->getAPIObject();
            $result = $this->makeAPICall (self::ACTION_POST, self::API_CONTACT_ADDRESS, $requestBody);
            if ($result->success) {
                $result->content = new VirtuousContactAddressVO($result->content);
            }
        }
        return $result;
    }

    /**
     * Update a contact address
     * @param VirtuousContactAddressVO $address
     * @return ResponseVO $response
     */
    public function updateContactAddress($address)
    {
        $result = new ResponseVO();
        if($address) {
            $requestBody = $address->getAPIObject();
            unset($requestBody['id']);
            $result = $this->makeAPICall (self::ACTION_PUT, self::API_CONTACT_ADDRESS."/{$address->id}", $requestBody);
            if ($result->success) {
                $result->content = new VirtuousContactAddressVO($result->content);
            }
        }
        return $result;
    }

    /**
     * Find contacts based on a search term
     * @param String $searchTerm
     * $searchTerm is interpreted by Virtuous API. Possible values are email or full name. Other values must be tested first
     * @return ResponseVO $response
     * @return Array(VirtuousContactSearchVO) $response->matches. List of matching items.
     */
    public function findContacts($searchTerm)
    {
        $requestBody = [
            'search' => $searchTerm
        ];
        $result = $this->makeAPICall (self::ACTION_POST, self::API_CONTACT_SEARCH, $requestBody);
        $result->matches = null;
        if ($result->success && $result->content->total>0) {
            $result->matches = $result->content->list;
        }
        return $result;
    }

    /**
     * Find tags based on a search term
     * @param String $searchTerm
     * @return ResponseVO $response
     * @return Array(StdClass) $response->matches. List of matching items.
     */
    public function findTag($searchTerm)
    {
        $requestBody = [
            'search' => $searchTerm
        ];
        $result = $this->makeAPICall (self::ACTION_POST, self::API_TAG_SEARCH, $requestBody);
        $result->matches = null;
        if ($result->success && $result->content->total>0) {
            $result->matches = $result->content->list;
        }
        return $result;
    }

    /**
     * Request the contact individual model, by ID
     * @param int $contactIndividualId
     * @return ResponseVO
     */
    public function getContactIndividual ($contactIndividualId)
    {
        $response = $this->makeAPICall (self::ACTION_GET, self::API_CONTACT_INDIVIDUAL."/$contactIndividualId");
        if ($response->success) {
            $response->content = new VirtuousContactIndividualVO($response->content);
        }
        return $response;
    }

    /**
     * Update a contact individual
     * @param VirtuousContactIndividualVO $updatedContactIndividual
     * @return ResponseVO $response
     */
    public function updateContactIndividual(VirtuousContactIndividualVO $contactIndividual)
    {
        $requestBody = $contactIndividual->getAPIObject();
        unset($requestBody['id']);
        $result = $this->makeAPICall (self::ACTION_PUT, self::API_CONTACT_INDIVIDUAL."/{$contactIndividual->id}", $requestBody);
        if ($result->success) {
            $result->content = new VirtuousContactIndividualVO($result->content);
        }
        return $result;
    }

    /**
     * Adds contact methods to a Virtuous Contact
     * @return ResponseVO
     * @todo: Test functionality
     */
    public function createContactMethods (VirtuousContactVO $contact)
    {
        $response = new ResponseVO();
        $itemsAdded = 0;
        $totalItems = 0;
        foreach ($contact->contactIndividuals as $individual) {
            foreach ($individual->contactMethods as $contactMethod) {
                $totalItems++;
                $contactMethodResponse = $this->createContactMethod ($individual, $contactMethod);
                $itemsAdded += intval($contactMethodResponse->success);
            }
        }
        $response->success = $itemsAdded == $totalItems;
        return $response;
    }

    /**
     * Adds a contact method to a Virtuous Contact
     * @param VirtuousContactIndividualVO $contactIndividual
     * @param VirtuousContactMethodVO $contactMethod
     * @return ResponseVO $response
     * @return VirtuousContactMethodVO $response->content
     * @todo: Test functionality
     */
    public function createContactMethod ($contactIndividual, $contactMethod)
    {
        $result = new ResponseVO();
        if($contactIndividual && $contactMethod) {
            $contactMethod->contactIndividualId = $contactIndividual->id;
            $requestBody = $contactMethod->getAPIObject();
            $result = $this->makeAPICall (self::ACTION_POST, self::API_CONTACT_METHOD, $requestBody);
            if ($result->success) {
                $result->content = new VirtuousContactMethodVO($result->content);
            }
        }
        return $result;
    }

    /**
     * Update the contact method of a contact individual
     * @param VirtuousContactMethodVO $contactMethod
     * @return ResponseVO $response
     */
    public function updateContactMethod($contactMethod)
    {
        $result = new ResponseVO();
        if($contactMethod) {
            $requestBody = $contactMethod->getAPIObject();
            unset($requestBody['id']);
            $result = $this->makeAPICall (self::ACTION_PUT, self::API_CONTACT_METHOD."/{$contactMethod->id}", $requestBody);
            if ($result->success) {
                $result->content = new VirtuousContactMethodVO($result->content);
            }
        }
        return $result;
    }

    /**
     * Requests a Virtuous API access token and sets the authentication property, is success
     * @return ResponseVO $response
     * @see authentication property
     */
    private function connect ()
    {
        global $username;
        global $password;

        $response = new ResponseVO();

        if (!empty($username) && !empty($password)) {
            $requestBody = [
                'grant_type' => 'password',
                'username' => $username,
                'password' => $password,
            ];
            $requestURL = self::VIRTUOUS_API_URL.'/Token';

            $ch = curl_init($requestURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::ACTION_POST);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($requestBody));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $curlResponse = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
            curl_close ($ch);

            $jsonResponse = json_decode($curlResponse);
            $response->statusCode = $httpcode;
            $response->statusText = "HTTP status: $httpcode";
            if ($httpcode == self::RESPONSE_CODE_OK) { // Success
                $response->success = true;
                $response->content = $jsonResponse;
                $this->authentication = new VirtuousAuthenticationVO ($jsonResponse);
            } else {
                $response->statusText = 'Login Failed';
                if ($jsonResponse) {
                    if (isset($jsonResponse->errorResponse)) {
                        $response->statusText = $jsonResponse->errorResponse->message;
                        $response->content = $jsonResponse->errorResponse;
                    } else {
                        $response->content = $jsonResponse;
                    }
                } else {
                    $response->content = $curlResponse;
                }
            }
            if (!$response->success) {
                write_log('httpcode '.$httpcode);
                write_log('VirtuousConnection.connect '.$requestURL);
                write_log('Response '.json_encode($response->content));
            }
        }
        return $response;
    }

    /**
     * Performs a Virtuous API call
     *
     * @param string $action
     * @param string $method
     * @param mixed $requestBody = null. Array or JSON formatted string
     * @param string $logMode = ApiLog::LOG_MODE_DEFAULT
     * @return RequestoVO $response
     */
    private function makeAPICall ($action, $method, $requestBody = null)
    {
        $response = new ResponseVO();
        $headers = [
            "Authorization: Bearer {$this->authentication->access_token}",
            'Content-Type: application/json',
        ];

        $requestURL = self::VIRTUOUS_API_URL."/api/$method";
        $ch = curl_init($requestURL);

        // echo '$requestURL: <br>';
        // echo '<pre>';
        // var_dump($requestURL);
        // echo '</pre>';

        // echo '$response->statusCode: <br>';
        // echo '<pre>';
        // var_dump($requestBody);
        // echo '</pre>';

        if ($action == self::ACTION_POST || $action == self::ACTION_PUT) {
            $data_string = json_encode($requestBody);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            $headers[] = 'Content-Length: ' . strlen($data_string);
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $action);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $curlResponse = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close ($ch);

        $jsonResponse = json_decode($curlResponse);
        $response->success = $httpcode == self::RESPONSE_CODE_OK;
        $response->statusCode = $httpcode;

        // echo '$response->statusCode: <br>';
        // echo '<pre>';
        // var_dump($response->statusCode);
        // echo '</pre>';

        if ($response->success) {
            $response->statusText = "Success: VirtuousConnection $action $method";
            $response->content = $jsonResponse;
        } else {
            $response->statusText = "Failed: VirtuousConnection $action $method - HTTP status: $httpcode";
            if ($jsonResponse) {
                if (isset($jsonResponse->errorResponse)) {
                    $response->statusText = $jsonResponse->errorResponse->message;
                    $response->content = $jsonResponse->errorResponse;
                } else {
                    $response->content = $jsonResponse;
                }
            } else {
                $response->content = $curlResponse;
            }
        }
        if ($httpcode!=self::RESPONSE_CODE_OK) {
            write_log('httpcode '.$httpcode);
            write_log("VirtuousConnection.makeAPICall $action $requestURL");
            write_log('RequestBody '.json_encode($requestBody));
            write_log('Response '.json_encode($response->content));
        }
        return $response;
    }
}
