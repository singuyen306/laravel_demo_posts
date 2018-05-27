<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\User\UserInterface;
use App\Repository\User\UserRepository;
use App\Repository\Role\RoleInterface;
use App\Repository\Role\RoleRepository;
use App\Repository\Post\PostInterface;
use App\Repository\Post\PostRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
    }
}
