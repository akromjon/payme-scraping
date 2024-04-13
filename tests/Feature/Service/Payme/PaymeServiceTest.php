<?php

use Service\Payme\Payme;
use Tests\TestCase;
use TwoCaptcha\TwoCaptcha;



class PaymeServiceTest extends TestCase
{

    // public function test_it_can_get_payme_url()
    // {
    //     $payme = new Payme;
    //     $this->assertIsString($payme->getBackendUrl());
    // }

    public function test_it_can_get_token_from_recaptcha()
    {
        $capture = new TwoCaptcha([
            'server'           => 'https://www.google.com/recaptcha/api2/userverify',
            'apiKey'           => 'YOUR_API_KEY',
            'softId'           => 123,
            'defaultTimeout'   => 120,
            'recaptchaTimeout' => 600,
            'pollingInterval'  => 10,
        ]);

        $resutl=$capture->recaptcha([
            'sitekey' => '6LeHCq8nAAAAAGaQewY8vK9s5-Des5-nxmU2vlG',
            'url'     => 'https://payme.uz/login',
            'version' => 'v3',
        ]);

        dd($resutl);
    }
}
