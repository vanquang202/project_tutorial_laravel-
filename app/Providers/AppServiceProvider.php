<?php

namespace App\Providers;

use App\Services\Repository\ClassroomR;
use App\Services\Repository\ClassroomRI;
use App\Services\Repository\VoucherR;
use App\Services\Repository\VoucherRI;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VoucherRI::class,VoucherR::class);
        $this->app->bind(ClassroomRI::class,ClassroomR::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}