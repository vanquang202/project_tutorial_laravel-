<?php

namespace App\Providers;

use App\Services\Repository\CalendarR;
use App\Services\Repository\CalendarRI;
use App\Services\Repository\ClassroomR;
use App\Services\Repository\ClassroomRI;
use App\Services\Repository\CourseR;
use App\Services\Repository\CourseRI;
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
        $this->app->bind(CalendarRI::class,CalendarR::class);
        $this->app->bind(CourseRI::class,CourseR::class);
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