<?php

namespace Magnetic\Planner\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Magnetic\Planner\Events\CsvEvent;
use Magnetic\Planner\Listeners\GenerateCsv;
use Magnetic\Planner\Listeners\EmailAuthenticatedUser;


class PlannerEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CsvEvent::class => [
            GenerateCsv::class,
            EmailAuthenticatedUser::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    public function register(){
        
    }
}
