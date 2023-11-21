<?php

namespace Fowitech\OneSignal;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class OneSignalClient
{
    public $httpClient;

    public function __construct(Client $client)
    {
        $this->httpClient = $client;
    }

    public function post($uri, $payload)
    {
        return $this->request('post', $uri, [
            'json' => $payload
        ]);
    }

    public function get($uri, $payload)
    {
        return $this->request('post', $uri, [
            'query' => $payload
        ]);
    }

    public function request(string $type, string $uri, $payload): array
    {
        try {
            $request = $this->httpClient->{$type}($uri, $payload);
            $content = $request->getBody()->getContents();
            $content = json_decode($content, true);
            if (!empty($content['id'])) {
                return [
                    'status' => true,
                    'data' => $content['id']
                ];
            } else {
                if (isset($content['errors']) && !isset($content['errors']['invalid_aliases'])) {
                    Log::debug("[ONESIGNAL ERROR LOG]", $content);
                }
                return [
                    'status' => false,
                    'message' => $content['errors'][0] ?? '',
                ];
            }
        } catch (ClientException $exception) {
            $content = $exception->getResponse()->getBody()->getContents();
            $response = json_decode($content, true);
            Log::debug("[ONESIGNAL ERROR LOG]", $response);
            return [
                'status' => false,
                'message' => $response['errors'][0] ?? '',
            ];
        }
    }
}
