<?php

namespace Service\Payme;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;

class Payme
{
    protected string $backend_url = "https://api-e3abced5.payme.uz/api/";

    public function get_backend_url(): string
    {
        return $this->backend_url;
    }

    protected function base_route(string $method, string $route, array $payload = []): Response|HttpResponseException
    {
        $res = Http::$method($this->get_backend_url() . "$route", $payload);

        if (200!==$res->status()) {

            throw new \Exception("Request Failed");
        }

        return $res;
    }

    public function login(): bool|\Exception
    {
        $response = $this->base_route(
            method: "POST",
            route: "/users.log_in",
            payload: [
                "method" => "users.log_in",
                "params" => [
                    "login" => env("PAYME_LOGIN","991230405"),
                    "password" => env("PAYME_PASSWORD", "test")
                ]
            ]
        );

        if (-32504 === $response->object()?->error?->code) {
            throw new \Exception("Access Denied at the Response".$response->body());
        }

        return $response->ok();
    }
}
