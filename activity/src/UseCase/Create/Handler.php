<?php

declare(strict_types=1);

namespace App\UseCase\Create;

use App\Entity\Activity;
use App\Entity\Id;
use App\Entity\Url;
use App\Repository\ActivityRepository;
use App\Repository\Flusher;
use DateTimeImmutable;

class Handler
{
    private ActivityRepository $activities;
    private Flusher $flusher;

    public function __construct(
        ActivityRepository  $activities,
        Flusher $flusher
    )
    {
        $this->activities = $activities;
        $this->flusher = $flusher;
    }

    /**
     * @param \App\UseCase\Create\Command $command
     * @throws \Exception
     */
    public function handle(Command $command): void
    {
        $activity = new Activity(Id::next(), new Url($command->url), new DateTimeImmutable($command->visitDate));

        $this->activities->add($activity);
        $this->flusher->flush();
    }
}