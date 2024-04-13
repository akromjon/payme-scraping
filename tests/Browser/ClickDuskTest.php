<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ClickDuskTest extends DuskTestCase
{

    public function test_it_can_browse()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit("https://my.click.uz/auth")
                ->screenshot("click.uz_login")
                ->type("input[type='tel'].phoneNumber", env("CLICK_UZ_LOGIN"))
                ->press('Войти')
                ->waitForText('Что-то пошло не так. Попробуйте повторить запрос позже', 10)
                ->type("input[type='tel']", '12345')
                ->press("Подтвердить")
                ->pause(100000);
        });
    }
}
