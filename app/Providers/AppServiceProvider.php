<?php

namespace App\Providers;

use App\Services\Repository\CalendarR;
use App\Services\Repository\CalendarRI;
use App\Services\Repository\CategoryR;
use App\Services\Repository\CategoryRI;
use App\Services\Repository\ClassroomR;
use App\Services\Repository\ClassroomRI;
use App\Services\Repository\CourseR;
use App\Services\Repository\CourseRI;
use App\Services\Repository\StudentR;
use App\Services\Repository\StudentRI;
use App\Services\Repository\UserR;
use App\Services\Repository\UserRI;
use App\Services\Repository\VoucherR;
use App\Services\Repository\VoucherRI;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
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
        $this->app->bind(CategoryRI::class,CategoryR::class);
        $this->app->bind(StudentRI::class,StudentR::class);
        $this->app->bind(UserRI::class,UserR::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryRI $category)
    {
        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
        Arr::macro("categorys",function () use ($category) {
            return $category->getAll();
        });
    }
}
