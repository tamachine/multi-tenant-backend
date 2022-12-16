<?php

namespace Tests\Browser\Components;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LanguageTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function tearDown(): void {        
        parent::tearDown();

        //delete session after every test to force the language to be english at the beginning
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->script("localStorage.clear()");
        });
    }

    /**
     * @test
     *
     * @return void
     */
    public function userCanChangeLanguageOnDesktop()
    {
        $this->browse(function (Browser $browser) {                 
            $browser->visit('/')
                    ->click('.language-selector')
                    ->clickLink('Spanish')
                    ->pause(500)
                    ->click('.language-selector')
                    ->assertSee('Español');            
        });        
    }  
    
    /**
     * @test
     *
     * @return void
     */
    public function userCanChangeLanguageOnMobile()
    {        
        $this->browse(function (Browser $browser) {                                         
            $browser->resize(375, 667)
                    ->visit('/')   
                    ->click('.menu-selector')
                    ->pause(500)                    
                    ->click('.language-selector-mobile')                                        
                    ->pause(500)                    
                    ->clickLink('Spanish')                    
                    ->pause(500)                             
                    ->click('.menu-selector')
                    ->pause(500)
                    ->click('.language-selector-mobile')
                    ->pause(500)
                    ->assertSee('Español');
        });        
    } 
}
