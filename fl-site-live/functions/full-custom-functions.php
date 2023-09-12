<?php

    $blocksBreakpoints = [
        "small" => "0",
        "medium" => "640",
        "large" => "1024",
    ];

    /**
     * Check the number if is black return 0
     * @param  string $valueNumber
     * @return string $valueNumber
     */
    function checkNumber($valueNumber)
    {
        return ($valueNumber == "") ? "0" : $valueNumber ;
    }

    /**
     * Check IOS Devices
     * @return bool
     */
    function isIosDevices()
    {
        if(
            stristr($_SERVER['HTTP_USER_AGENT'], 'iphone') === false
            && stristr($_SERVER['HTTP_USER_AGENT'], 'ipad') === false
        ){
            return false;
        }
        return true;
    }
