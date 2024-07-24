<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\Attendance;
use App\Enums\AttendanceEnum;
use Illuminate\Console\Command;
use App\Models\ClassroomStudent;

class CreateAttendanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-attendance-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
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
    }
}
