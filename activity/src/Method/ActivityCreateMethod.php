<?php

namespace App\Method;

use App\UseCase\Create;
use Yoanm\JsonRpcServer\Domain\JsonRpcMethodInterface;

class ActivityCreateMethod implements JsonRpcMethodInterface
{

    private Create\Handler $handler;

    public function __construct(Create\Handler $handler)
    {
        $this->handler = $handler;
    }

    public function apply(array $paramList = null): array
    {
        $command = new Create\Command();
        $command->url = $paramList['url'];
        $command->visitDate = $paramList['visitDate'];
        $this->handler->handle($command);
        return [];
    }


}