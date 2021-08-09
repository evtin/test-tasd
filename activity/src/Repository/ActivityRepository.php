<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Activity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class ActivityRepository
{
    private $em;
    private EntityRepository $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        //$this->repo = $em->getRepository(Activity::class);
    }

    public function add(Activity $activity): void
    {
        $this->em->persist($activity);
    }
}
