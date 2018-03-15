<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Eloquent\EloquentCategory;
use App\Repositories\Contracts\IncomeRepository;
use App\Repositories\Eloquent\EloquentIncome;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $defer = true;

    protected $repositoryMap = [
        CategoryRepository::class => EloquentCategory::class,
        IncomeRepository::class => EloquentIncome::class,
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositoryMap as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    public function provides()
    {
        return array_keys($this->repositoryMap);
    }
}
