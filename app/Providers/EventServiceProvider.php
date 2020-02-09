<?php

namespace App\Providers;

use App\Events\Purchased;
use App\Events\Sold;
use App\Listeners\PurchaseListener;
use App\Listeners\SaleListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Purchased::class => [
            PurchaseListener::class,
        ],
        Sold::class=>[
            SaleListener::class,
        ]
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
