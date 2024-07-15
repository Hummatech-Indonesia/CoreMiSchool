<?php

namespace App\Providers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\CityInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ExtracurricularInterface;
use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\LevelClassInterface;
use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\ProvinceInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\SubDistrictInterface;
use App\Contracts\Interfaces\TeacherMapleInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\VillageInterface;
use App\Contracts\Repositories\AttendanceRepository;
use App\Contracts\Repositories\AttendanceRuleRepository;
use App\Contracts\Repositories\CityRepository;
use App\Contracts\Repositories\ClassroomRepository;
use App\Contracts\Repositories\ClassroomStudentRepository;
use App\Contracts\Repositories\EmployeeRepository;
use App\Contracts\Repositories\ExtracurricularRepository;
use App\Contracts\Repositories\LessonHourRepository;
use App\Contracts\Repositories\LessonScheduleRepository;
use App\Contracts\Repositories\LevelClassRepository;
use App\Contracts\Repositories\MapleRepository;
use App\Contracts\Repositories\ModelHasRfidRepository;
use App\Contracts\Repositories\ProvinceRepository;
use App\Contracts\Repositories\ReligionRepository;
use App\Contracts\Repositories\RfidRepository;
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
        EmployeeInterface::class => EmployeeRepository::class,
        MapleInterface::class => MapleRepository::class,
        VillageInterface::class => VillageRepository::class,
        SchoolYearInterface::class => SchoolYearRepository::class,
        ClassroomInterface::class => ClassroomRepository::class,
        TeacherMapleInterface::class => TeacherMapleRepository::class,
        ClassroomStudentInterface::class => ClassroomStudentRepository::class,
        LessonHourInterface::class => LessonHourRepository::class,
        LessonScheduleInterface::class => LessonScheduleRepository::class,
        AttendanceInterface::class => AttendanceRepository::class,
        RfidInterface::class => RfidRepository::class,
        LevelClassInterface::class => LevelClassRepository::class,
        AttendanceRuleInterface::class => AttendanceRuleRepository::class,
        ModelHasRfidInterface::class => ModelHasRfidRepository::class,
        ExtracurricularInterface::class => ExtracurricularRepository::class
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
    public function boot()
    {
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
    }

}
