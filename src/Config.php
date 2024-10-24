<?php

namespace Przelewy24;

use Przelewy24\Enums\Environment;

class Config
{
    public function __construct(
        private readonly int $merchantId,
        private readonly string $reportsKey,
        private readonly string $crc,
        private readonly Environment $environment = Environment::SANDBOX,
        private readonly ?int $posId = null,
    ) {}

    public function merchantId(): int
    {
        return $this->merchantId;
    }

    public function posId(): int
    {
        return $this->posId ?? $this->merchantId();
    }

    public function reportsKey(): string
    {
        return $this->reportsKey;
    }

    public function crc(): string
    {
        return $this->crc;
    }

    public function environment(): Environment
    {
        return $this->environment;
    }
}
