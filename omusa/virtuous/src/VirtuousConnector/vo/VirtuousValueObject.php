<?php
namespace VirtuousConnector\vo;

use \IteratorAggregate;
use \ArrayIterator;

/**
 * Extended classes of VirtuousValueObject are mean to define the properties of DB or API objects
 */
abstract class VirtuousValueObject implements IteratorAggregate {
    // Prevent Virtuous API issues when JSON parsing converts boolean values to integer.
    const TRUE = 'true';
    const FALSE = 'false';

    /**
     * @property Array(String) $exportFields
     * A list of class properties to be iterated when sending an instance data to Virtuous API
     */
    protected $exportFields;

    /**
     * Constructor method
     * @param mixed initialValues. An object or associative array to set the initial instance properties with
     */
    public function __construct($initialValues = null)
    {
        $this->updateValues ($initialValues);
    }

    /**
     * Set the instance properties with values of matching keys from the given object
     * @param mixed $object
     */
    public function updateValues($object)
    {
        if ($object) {
            if (is_object($object)) {
                $object = get_object_vars ($object);
            }
            foreach ($object as $k => $v) {
                $this->$k = $v;
            }
        }
    }

    public function getIterator()
    {
        // Get only public properties
        return new ArrayIterator ($this);
    }

    /** Returns the value object fields as array, compatible with Virtuous API
     * @return Array
     * @see property exportFields
     */
    public function getAPIObject()
    {
        $result = [];
        if ($this->exportFields) {
            foreach ($this->exportFields as $field) {
                if ($this->$field!=null) {
                    $result[$field] = $this->sanitizeValue ($this->$field);
                }
            }
        } else {
            foreach ($this as $field=>$value) {
                if ($value!=null) {
                    $result[$field] = $this->sanitizeValue ($value);
                }
            }
        }
        return $result;
    }

    /**
     * Iterates over an array of items and calls getAPIObject() on each one
     * @param array(VirtuousValueObject) $objectsList
     * @return array(array) $result
     */
    protected function getInnerAPIObjects($objectsList)
    {
        $result = [];
        if ($objectsList) {
            if (is_array ($objectsList)) {
                foreach ($objectsList as $item) {
                    if (method_exists($item, 'getAPIObject')) {
                        array_push ($result, $item->getAPIObject());
                    }else{
                        array_push ($result, $item);
                    }
                }
            } else {
                error_log ('VirtuousValueObject::getInnerAPIObjects parameters must be an array', 0);
                $result = $objectsList;
            }
        }
        return count($result)>0&&$result[0] ? $result : null;
    }

    /**
     * Performs some convertions to prevent known Virtuous issues with some data types
     * @param mixed $value
     * @return mixed $value
     */
    public function sanitizeValue ($value)
    {
        // Converts boolean values to strings to prevent Virtuous failing if they're converted to integers on the fly.
        if (is_bool($value)) {
            $value = $value ? self::TRUE : self::FALSE;
        }
        return $value;
    }
}
