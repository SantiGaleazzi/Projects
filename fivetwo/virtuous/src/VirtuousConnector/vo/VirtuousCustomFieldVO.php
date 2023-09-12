<?php
namespace VirtuousConnector\vo;

use VirtuousConnector\vo\VirtuousValueObject;

/**
 * Value Object for custom field items
 */
class VirtuousCustomFieldVO extends VirtuousValueObject
{
    const DATA_TYPE_BOOLEAN = 'Boolean';
    const DATA_TYPE_DATE_TIME = 'DateTime';
    const DATA_TYPE_DECIMAL = 'Decimal';
    const DATA_TYPE_TEXT = 'Text';
    const DATA_TYPE_LIST = 'List';
    const DATA_TYPE_LINK = 'Link';

    public $dataType = self::DATA_TYPE_TEXT;
    public $name;
    public $value;
}
