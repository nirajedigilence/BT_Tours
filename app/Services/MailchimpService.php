<?php
namespace App\Services;

use GuzzleHttp\Client;

class MailchimpService
{
    protected $client;
    protected $apiKey;
    protected $listId;
    protected $serverPrefix;

    public function __construct()
    {
        $this->apiKey = config('services.mailchimp.api_key');
        $this->listId = config('services.mailchimp.list_id');
        $this->serverPrefix = config('services.mailchimp.server_prefix');
        $this->client = new Client([
            'base_uri' => "https://{$this->serverPrefix}.api.mailchimp.com/3.0/"
        ]);
    }

    public function subscribe($email)
    {
        $response = $this->client->post("lists/{$this->listId}/members", [
            'auth' => ['anystring', $this->apiKey],
            'json' => [
                'email_address' => $email,
                'status' => 'subscribed'
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}