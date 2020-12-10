<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Providers\Repository;
use App\Providers\RepositoryBerita;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(Repository::class);
        $this->app->register(RepositoryBerita::class);
    }
}
