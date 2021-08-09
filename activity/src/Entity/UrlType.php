<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class UrlType extends StringType
{
    public const NAME = 'activity_activity_url';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Url ? $value->getValue() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Url
    {
      return !empty($value) ? new Url($value) : null;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
