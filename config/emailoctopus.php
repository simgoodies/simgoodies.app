<?php

return [
    'general' => [
        'api-key' => env('EMAIL_OCTOPUS_API_KEY'),
        'base-api-url' => 'https://emailoctopus.com/api/1.5',
    ],
    'contact-lists' => [
        'vatgoodies_newsletter' => env('EMAIL_OCTOPUS_CONTACT_LISTS_VATGOODIES_NEWSLETTER'),
    ],
];
