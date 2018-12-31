<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TodoTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
    * Register test.
    *
    * @return void
    */

    public function testSignUp(){
        $this->browse(function ($browser){
          $browser->visit('/signup')
                  ->type('name', 'adam')
                  ->type('email', 'adam@adam.com')
                  ->type('password', 'adam')
                  ->press('Submit')
                  ->clicklink('Logout');
        });
    }

    public function testLogin()
    {
        $this->browse(function ($browser) {
            $browser->type('email', 'adam@adam.com')
                ->type('password', 'adam')
                ->press('Submit');
        });
    }

    public function testCreateTodos(){

      $this->browse(function($browser) {
          $browser->type('@todo.title', 'Whatever')
                  ->pause(999999);
                  // ->keys('{enter}')

      });

    }
}
