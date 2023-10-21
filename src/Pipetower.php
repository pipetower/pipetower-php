<?php

namespace Pipetower\PhpSdk;

use GuzzleHttp\Client;
use Pipetower\PhpSdk\Actions\ManagesAccounts;
use Pipetower\PhpSdk\Actions\ManagesServers;

class Pipetower
{
    use MakesHttpRequests;

    private string $apiToken;
    private Client $client;

    public ManagesAccounts $account;
    public ManagesServers $servers;

    /**
     * Create a new Pipetower instance as the API client
     */
    public function __construct(string $apiToken, string $baseUri = 'https://app.pipetower.com/api/')
    {
        $this->apiToken = $apiToken;

        $this->client = new Client([
            'base_uri' => $baseUri,
            'http_errors' => false,
            'headers' => [
                'Authorization' => "Bearer $apiToken",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        $this->initActions();
    }

    /**
     * Initialize all available resource actions
     */
    private function initActions(): void
    {
        $this->account = new ManagesAccounts($this);
        $this->servers = new ManagesServers($this);
    }
}