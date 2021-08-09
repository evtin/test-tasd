<?php

namespace App\Method;

use App\Repository\ActivityFetcher;
use Doctrine\DBAL\Driver\Exception;
use Yoanm\JsonRpcServer\Domain\JsonRpcMethodInterface;

class ActivityIndexMethod implements JsonRpcMethodInterface
{
    private ActivityFetcher $activities;

    public function __construct(ActivityFetcher $activities)
    {
        $this->activities = $activities;
    }

    public function apply(array $paramList = null)
    {
        try {
            return $this->activities->getAll();
        } catch (Exception | \Doctrine\DBAL\Exception $e) {
            return [];
        }
    }
}