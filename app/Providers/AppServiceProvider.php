<?php

namespace App\Providers;

use App\Contracts\Interfaces\ProvinceInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Repositories\ProvinceRepository;
use App\Contracts\Repositories\ReligionRepository;
use App\Contracts\Repositories\StudentRepository;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        UserInterface::class => UserRepository::class,
        StudentInterface::class => StudentRepository::class,
        ReligionInterface::class => ReligionRepository::class,
        ProvinceInterface::class => ProvinceRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) {
            $this->app->bind($index, $value);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
