<?php

namespace App\Providers;


use Barryvdh\Reflection\DocBlock\Tag;

use Cache;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\ServiceProvider;
use Queue;
use Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::before(function (JobProcessing $event){
            $event->connectionName;
            $event->job;
            $event->job->payload();

        });

        Queue::after(function (JobProcessed $event){
            $event->connectionName;
            $event->job;
            $event->job->payload();
        });
        Queue::failing(function (JobFailed $event){
            $event->connectionName;
            $event->job;
            $event->exception;
        });
    }
}
