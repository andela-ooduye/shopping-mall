<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticationTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicAuthenticationExample()
    {
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                ->visit('/home');
        });
    }
}
