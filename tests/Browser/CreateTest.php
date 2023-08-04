<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class CreateTest extends DuskTestCase
{
    use DatabaseMigrations, InteractsWithDatabase;

    public function testCreateFinding()
    {   
        $this->browse(function ($browser) {
            $browser->visit('/findings/create')
                    ->assertSee('Создание новой находки');
        });

        $this->browse(function ($browser) {
            $browser->type('name', 'Название находки')
                    ->type('location', 'Местонахождение находки')
                    ->type('contacts', 'Контакты для связи')
                    ->press('Подтвердить');
        });
        
        $this->browse(function ($browser) {
            $lastFinding = \App\Models\Finding::orderBy('id', 'desc')->first();
            $browser->assertDatabaseHas('findings', [
                'id' => $lastFinding->id,
                'name' => 'Название находки',
                'location' => 'Местонахождение находки',
                'contacts' => 'Контакты для связи',
            ]);
        });
    }
}

