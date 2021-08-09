<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Connection;

class ActivityFetcher
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws \Doctrine\DBAL\Exception|\Doctrine\DBAL\Driver\Exception
     */
    public function getAll(): array
    {
        return $this->connection->createQueryBuilder()
            ->select('url, count(url) AS count_visits, max(visit_date) AS last_visit')
            ->from('activity_activity')
            ->groupBy('activity_activity.url')
            ->execute()
            ->fetchAllAssociative();
    }

}
