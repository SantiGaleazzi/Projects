<?php

namespace App\Library;

use App\Log;
use App\Organization;
use App\Library\SendEmail;

class ApiLog
{
    const LOG_MODE_FORCE = 'force';
    const LOG_MODE_IGNORE = 'ignore';
    const LOG_MODE_DEFAULT = 'default';

    public static function create($status, $type, $endpoint, $payload, $response, $organizationId)
    {
        if (self::statusNoTSuccessful($status)) {
            self::sendNotification($status, $type, $endpoint, $payload, $response, $organizationId);
        }

        return Log::create([
                'status'            => $status,
                'type'              => $type,
                'endpoint'          => $endpoint,
                'payload'           => json_encode($payload),
                'response'          => json_encode($response),
                'organization_id'   => $organizationId,
            ]);
    }

    public static function statusNoTSuccessful($status)
    {
        return ((int)$status >= 400) ? true : false;
    }

    public static function sendNotification($status, $type, $endpoint, $payload, $response, $organizationId)
    {
        SendEmail::donationError([
            'type'          => $type,
            'status'        => $status,
            'endpoint'      => $endpoint,
            'payload'       => $payload,
            'response'      => $response,
            'organization'  => Organization::find($organizationId)->name,
        ]);
    }
}
