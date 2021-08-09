<?php
declare(strict_types=1);

namespace App\Service;

use DateTimeImmutable;

interface ActivityClientInterface
{
    public function sendActivity(string $uri, DateTimeImmutable $visitTime): void;
    public function getActivityList(int $page, int $perPage): array;
}