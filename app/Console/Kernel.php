<?php

namespace App\Console;

use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\Attendance;
use App\Enums\AttendanceEnum;
use App\Models\AttendanceRule;
use App\Models\ClassroomStudent;
use App\Models\LessonHour;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

        // $schedule->call(function () {
        //     Log::info('running command... ' . now()->format('Y-m-d H:i:s'));
        // })->onFailureWithOutput(function ($output) {
        //     var_dump('failed: ' . $output);
        // })
        //     ->timezone('Asia/Jakarta')
        //     ->everyMinute();

        $schedule->command('command:create-attendance')
            ->onFailureWithOutput(function ($output) {
                var_dump('failed: ' . $output);
            })
            ->onSuccessWithOutput(function ($output) {
                var_dump('success: ' . $output);
            })->dailyAt('01:00');
        $schedule->command('command:delete-attendance')->dailyAt('23:00');

        // $schedule->command('command:test-cron')->onFailureWithOutput(function ($e) {
        //     Log::error($e);
        // })
        //     ->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
