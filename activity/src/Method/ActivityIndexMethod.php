<?php

namespace App\Method;

use Yoanm\JsonRpcServer\Domain\JsonRpcMethodInterface;

class ActivityIndexMethod implements JsonRpcMethodInterface
{
    public function apply(array $paramList = null)
    {
        return [
            [
                'url' => '/',
                'countVisits' => 30,
                'lastVisit' => '2021-08-08 21:56:52',
            ],
            [
                'url' => '/',
                'countVisits' => 30,
                'lastVisit' => '2021-08-08 21:56:52',
            ],
            [
                'url' => '/',
                'countVisits' => 30,
                'lastVisit' => '2021-08-08 21:56:52',
            ],
            [
                'url' => '/',
                'countVisits' => 30,
                'lastVisit' => '2021-08-08 21:56:52',
            ],
        ];
    }
}