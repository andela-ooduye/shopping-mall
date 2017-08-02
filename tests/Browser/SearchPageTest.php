<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchPageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSearchPageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/search')
                ->assertSee('Shopping Mall')
                ->assertSee('Search')
                ->press('.btn')
                ->waitForText('Search')
                ->assertSee('View');
        });
    }

}
