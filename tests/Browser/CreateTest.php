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
                    ->pause(1000)
                    ->assertSee('Создание новой находки')
                    ->type('name', 'Название находки')
                    ->type('location', 'Местонахождение находки')
                    ->type('contacts', 'Контакты для связи')
                    ->attach('photo', storage_path('app/public/ok.jpg'))
                    ->press('Подтвердить');

            $lastFinding = \App\Models\Finding::orderBy('id', 'desc')->first();
            $this->assertDatabaseHas('findings', [
                'id' => $lastFinding->id,
                'name' => 'Название находки',
                'location' => 'Местонахождение находки',
                'contacts' => 'Контакты для связи',
            ]);
        });
    }
}

