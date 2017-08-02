<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WelcomePageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testWelcomePageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Shopping Mall')
                    ->assertSee('Search')
                    ->press('.btn')
                    ->waitForText('Search')
                    ->assertSee('View');
        });
    }
}
