<?php

namespace App\Method;

use Yoanm\JsonRpcServer\Domain\JsonRpcMethodInterface;

class ActivityIndexMethod implements JsonRpcMethodInterface
{
    public function apply(array $paramList = null)
    {
        return 'ActivityIndexMethod';
    }
}