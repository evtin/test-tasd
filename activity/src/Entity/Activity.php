<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="activity_activity")
 */
class Activity
{
    /**
     * @var Id
     * @ORM\Column(type="activity_activity_id")
     * @ORM\Id
     */
    private Id $id;

    /**
     * @ORM\Column(type="activity_activity_url", length=255, nullable=true)
     */
    private Url $url;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private DateTimeImmutable $visitDate;

    public function __construct(Id $id, Url $url, DateTimeImmutable $visitDate)
    {
        $this->id = $id;
        $this->url = $url;
        $this->visitDate = $visitDate;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    public function getVisitDate(): DateTimeImmutable
    {
        return $this->visitDate;
    }
}
