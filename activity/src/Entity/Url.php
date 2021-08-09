<?php

declare(strict_types=1);

namespace App\Entity;

use Webmozart\Assert\Assert;

class Url
{
    private $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value);
        $this->value = mb_strtolower($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}