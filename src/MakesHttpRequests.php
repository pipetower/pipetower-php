<?php

namespace Pipetower\PhpSdk;

use Exception;
use GuzzleHttp\Client;
use Pipetower\PhpSdk\Exceptions\MethodNotAllowedException;
use Pipetower\PhpSdk\Exceptions\NotFoundException;
use Pipetower\PhpSdk\Exceptions\UnauthenticatedException;
use Pipetower\PhpSdk\Exceptions\UnauthorizedException;
use Psr\Http\Message\ResponseInterface;

trait MakesHttpRequests
{
    private Client $client;

    /**
     * Perform a GET request
     */
    public function get(string $uri, array $params = []): mixed
    {
        return $this->request('GET', $uri, $params)['data'];
    }

    /**
     * Perform a POST request
     */
    public function post(string $uri, array $payload = []): mixed
    {
        return $this->request('POST', $uri, $payload)['data'];
    }

    /**
     * Perform the API request
     */
    private function request(string $method, string $uri, array $payload = []): mixed
    {
        $dataKey = $method == 'GET' ? 'query' : 'form_params';
        $response = $this->client->request($method, $uri, empty($payload) ? [] : [$dataKey => $payload]);

        if (!$this->isSuccessful($response)) {
            $this->handleRequestError($response);
        }

        $responseBody = (string)$response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * Check if the response (status code) can be considered as successful
     */
    private function isSuccessful(ResponseInterface $response): bool
    {
        return (int)substr($response->getStatusCode(), 0, 1) === 2;
    }

    /**
     * Throw the appropriate exception
     */
    private function handleRequestError(ResponseInterface $response): void
    {
        match ($response->getStatusCode()) {
            401 => throw new UnauthenticatedException((string) $response->getBody()),
            403 => throw new UnauthorizedException((string) $response->getBody()),
            404 => throw new NotFoundException((string) $response->getBody()),
            405 => throw new MethodNotAllowedException((string) $response->getBody()),
            default => throw new Exception((string) $response->getBody())
        };
    }
}