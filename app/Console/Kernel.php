<?php

namespace App\Console;

use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\Attendance;
use App\Enums\AttendanceEnum;
use App\Models\ClassroomStudent;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function() {
            $classroomStudents = ClassroomStudent::whereRelation('classroom.schoolYear', function ($query) {
                $query->where('active', 1);
            })->whereHas('student.modelHasRfid')->get();

            $teachers = Employee::whereHas('modelHasRfid')
                ->where('status', RoleEnum::TEACHER->value)
                ->get();

            $attendanceStudent = $classroomStudents->map(function ($student) {
                return [
                    'model_type' => "App/Models/ClassroomStudent",
                    'model_id' => $student->student->id,
                    'status' => AttendanceEnum::ALPHA->value
                ];
            })->toArray();

            $attendanceTeacher = $teachers->map(function ($teacher) {
                return [
                    'model_type' => "App/Models/Employee",
                    'model_id' => $teacher->id,
                    'status' => AttendanceEnum::ALPHA->value
                ];
            })->toArray();

            // $stored = $classroomStudents->attendance()->insert(['status' => 'alpha']);
            $attendanceData = array_merge($attendanceTeacher, $attendanceStudent);

            $stored = Attendance::insert($attendanceData);
        });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
