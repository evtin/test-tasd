<?php

namespace App\Method;

use Yoanm\JsonRpcServer\Domain\JsonRpcMethodInterface;

class ActivityCreateMethod implements JsonRpcMethodInterface
{
    public function apply(array $paramList = null): array
    {
        return [
            'ActivityCreateMethod',
            $paramList
        ];
    }
}