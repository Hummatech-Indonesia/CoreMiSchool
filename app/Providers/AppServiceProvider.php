<?php

namespace App\Providers;

use App\Contracts\Interfaces\CityInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\ProvinceInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\SubDistrictInterface;
use App\Contracts\Interfaces\TeacherMapleInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\VillageInterface;
use App\Contracts\Repositories\CityRepository;
use App\Contracts\Repositories\ClassroomRepository;
use App\Contracts\Repositories\ClassroomStudentRepository;
use App\Contracts\Repositories\LessonHourRepository;
use App\Contracts\Repositories\LessonScheduleRepository;
use App\Contracts\Repositories\MapleRepository;
use App\Contracts\Repositories\ProvinceRepository;
use App\Contracts\Repositories\ReligionRepository;
use App\Contracts\Repositories\SchoolRepository;
use App\Contracts\Repositories\SchoolYearRepository;
use App\Contracts\Repositories\StudentRepository;
use App\Contracts\Repositories\SubDistrictRepository;
use App\Contracts\Repositories\TeacherMapleRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\VillageRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        UserInterface::class => UserRepository::class,
        StudentInterface::class => StudentRepository::class,
        ReligionInterface::class => ReligionRepository::class,
        ProvinceInterface::class => ProvinceRepository::class,
        CityInterface::class => CityRepository::class,
        SubDistrictInterface::class => SubDistrictRepository::class,
        SchoolInterface::class => SchoolRepository::class,
        EmployeeInterface::class => EmployeeInterface::class,
        MapleInterface::class => MapleRepository::class,
        VillageInterface::class => VillageRepository::class,
        SchoolYearInterface::class => SchoolYearRepository::class,
        ClassroomInterface::class => ClassroomRepository::class,
        TeacherMapleInterface::class => TeacherMapleRepository::class,
        ClassroomStudentInterface::class => ClassroomStudentRepository::class,
        LessonHourInterface::class => LessonHourRepository::class,
        LessonScheduleInterface::class => LessonScheduleRepository::class,
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
