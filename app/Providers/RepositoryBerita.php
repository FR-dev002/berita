<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Model Repository
// Berita
use App\Repositories\Repository\Berita\BeritaRepository;
use App\Repositories\Repository\Berita\BeritaInterface;

class RepositoryBerita extends ServiceProvider
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
        $this->app->bind(BeritaInterface::class, BeritaRepository::class);
    }
}
