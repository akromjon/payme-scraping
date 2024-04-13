<?php

use Laravel\Dusk\Browser;
use Service\Payme\Payme;
use Tests\TestCase;
use TwoCaptcha\TwoCaptcha;



class PaymeServiceTest extends TestCase
{

    public function test_it_can_send_request_to_login()
    {
        $payme = new Payme();
        $res = $payme->login();
        $this->assertTrue($res);
    }
}
