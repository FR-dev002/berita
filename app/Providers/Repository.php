<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Base
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\EloquentRepositoryInterface;

class Repository extends ServiceProvider
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
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
    }
}
