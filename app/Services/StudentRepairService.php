<?php

    namespace App\Services;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Http\Requests\StoreStudentRepairRequest;

    class StudentRepairService
    {
        private StudentInterface $student;
        private ClassroomStudentInterface $classroom;
        private StudentRepairInterface $studentRepair;

        public function __construct(StudentInterface $student, ClassroomStudentInterface $classroom, StudentRepairInterface $studentRepair)
        {
            $this->student = $student;
            $this->classroom = $classroom;
            $this->studentRepair = $studentRepair;
        }

        public function store(StoreStudentRepairRequest $request): void
        {
            $data = $request->validated();

            $start_date = $data['start_date'];
            $end_date = $data['end_date'];

            foreach ($data['repeater-group'] as $group) {
                $repair = $group['repair'];
                $point = $group['point'];

                foreach ($group['classroom_student_id'] as $student_id) {
                    $student = $this->student->show($student_id);
                    $this->student->update($student->id, ['point' => ($student->point - $point) ]);

                    $classroom = $this->classroom->whereStudent($student_id);
                    $this->studentRepair->store([
                        'repair' => $repair,
                        'point' => $point,
                        'classroom_student_id' => $classroom->id,
                        'start_date' => $start_date,
                        'end_date' => $end_date
                    ]);
                }
            }
        }

        public function update(): void
        {

        }

        public function delete(): void
        {

        }
    }
