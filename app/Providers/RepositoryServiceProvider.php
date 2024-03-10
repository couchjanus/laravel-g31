<?php

namespace App\Providers;

use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [OrderContract::class => OrderRepository::class];
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
