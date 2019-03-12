<?php

namespace App\Libraries;

use Ixudra\Curl\Facades\Curl;

class EmailOctopusApi
{
    protected $baseApiUrl;
    
    protected $apiKey;
    
    public function __construct()
    {
        $this->baseApiUrl = config('emailoctopus.general.base-api-url');
        $this->apiKey = config('emailoctopus.general.api-key');
    }

    public function createContactOfAList(string $listId, $emailAddress)
    {
        $url = sprintf('%s/lists/%s/contacts', $this->baseApiUrl, $listId);
        
        return Curl::to($url)->withData([
            'api_key' => $this->apiKey,
            'email_address' => $emailAddress,
        ])->asJsonRequest()
        ->post();
    }
}
