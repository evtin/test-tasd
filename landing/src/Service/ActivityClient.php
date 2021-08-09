<?php

declare(strict_types=1);

namespace App\Service;

use DateTimeImmutable;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ActivityClient implements ActivityClientInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function sendActivity(string $uri, DateTimeImmutable $visitTime): void
    {
        try {
            $response = $this->client->request(
                'POST',
                'http://activity-nginx/json-rpc',
                [
                    'json' => [
                        'method' => 'activity.create',
                        "params" => [
                            "url" => $uri,
                            "visitDate" => $visitTime->format('Y-m-d H:i:s')
                        ],
                        'jsonrpc' => '2.0',
                        'id' => 1,
                    ],
                ]

            );
            $content = $response->toArray();
            dump($content);
        } catch (
        TransportExceptionInterface $e
        ) {
            //todo обработать исключения
        }
    }

    public function getActivityList(int $page, int $perPage): array
    {
        $result = [];
        try {
            $response = $this->client->request(
                'POST',
                'http://activity-nginx/json-rpc',
                [
                    'json' => [
                        'method' => 'activity.index',
                        "params" => [
                            'page' => 1,
                            'per_page' => 5
                        ],
                        'jsonrpc' => '2.0',
                        'id' => 1,
                    ],
                ]

            );
            $content = $response->toArray();
            $result = $content["result"];
        } catch (
        TransportExceptionInterface $e
        ) {
            //todo обработать исключения
        }
        return $result;
    }
}