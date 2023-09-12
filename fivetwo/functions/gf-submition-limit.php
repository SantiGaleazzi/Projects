<?php
    new GW_Submission_Limit(
    array(
        'form_ids' => array('1', '31'),
        'limit_by' => 'ip',
        'limit' => 2,
        'limit_message' => '<span style="font-size: 20px; color: #ffffff; font-weight: bold;">Apologies, you have reached the submission limit for this form.</span><style>.page-template-template-minute-multiplier .limit-message span{ color: #454545 !important;font-weight: bold;}</style>'
        )
    );

