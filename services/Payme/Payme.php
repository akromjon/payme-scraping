<?php

namespace Service\Payme;

class Payme
{
    protected string $backend_url = "https://api-e3abced5.payme.uz/api/";

    public function getBackendUrl(): string
    {
        return $this->backend_url;
    }

    public function login(): bool
    {
    }
}
