<?php

namespace Przelewy24\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Przelewy24\Config;
use Przelewy24\Enums\Environment;

class Api
{
    private const URL_PRODUCTION = 'https://secure.przelewy24.pl/';

    private const URL_SANDBOX = 'https://sandbox.przelewy24.pl/';

    private ?GuzzleClient $client = null;

    public function __construct(
        protected readonly Config $config,
    ) {}

    protected function client(): ClientInterface
    {
        if ($this->client) {
            return $this->client;
        }

        return $this->client = new GuzzleClient([
            'base_uri' => $this->apiUrl(),
            RequestOptions::AUTH => [
                $this->config->posId(),
                $this->config->reportsKey(),
            ],
            RequestOptions::CONNECT_TIMEOUT => 10,
            RequestOptions::CRYPTO_METHOD => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
            RequestOptions::TIMEOUT => 30,
        ]);
    }

    protected function apiUrl(): string
    {
        return match ($this->config->environment()) {
            Environment::PRODUCTION => self::URL_PRODUCTION,
            Environment::SANDBOX => self::URL_SANDBOX,
        };
    }
}
