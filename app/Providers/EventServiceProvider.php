<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $event->menu->add([
                'header'=> 'main_navigation',
                'classes' => 'text-bold text-center',
            ]);

            $event->menu->add([
                'text' => 'Produtos',
                'url' => 'produtos/',
                'icon' => 'nav-icon fas fa-laptop'
            ]);
            $event->menu->add([
                'text' => 'Documents',
                'url' => 'documentos/',
                'icon' => 'nav-icon fas fa-file-alt'
            ]);



        });
    }
}
