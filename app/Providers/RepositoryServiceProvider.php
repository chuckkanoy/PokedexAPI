<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //array for later autofill
        $models = [
            'User',
            'Login',
            'Pokemon',
            'Ability',
            'EggGroup',
            'Type',
            'Capture'
        ];

        //bind repository interfaces with repositories
        foreach($models as $model){
            $this->app->bind(
                "App\Repositories\Interfaces\\{$model}RepositoryInterface",
                "App\Repositories\\{$model}Repository"
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
