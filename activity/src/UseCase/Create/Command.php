<?php

declare(strict_types=1);

namespace App\UseCase\Create;

use Symfony\Component\Validator\Constraints as Assert;

class Command
{
    /**
     * @Assert\NotBlank()
     */
    public string $url;

    /**
     * @Assert\NotBlank()
     */
    public string $visitDate;
}