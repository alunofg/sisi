<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ZoneRepository::class, \App\Repositories\ZoneRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OccurrenceTypeRepository::class, \App\Repositories\OccurrenceTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OccurrenceReportRepository::class, \App\Repositories\OccurrenceReportRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OccurrenceObjectRepository::class, \App\Repositories\OccurrenceObjectRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\InvolvedPersonRepository::class, \App\Repositories\InvolvedPersonRepositoryEloquent::class);
        //:end-bindings:
    }
}
