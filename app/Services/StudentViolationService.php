<?php

namespace App\Services;

use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreStudentViolationRequest;

class StudentViolationService
    {

        private RegulationInterface $regulation;
        private StudentInterface $student;

        public function __construct(RegulationInterface $regulation, StudentInterface $student)
        {
            $this->regulation = $regulation;
            $this->student = $student;
        }

        public function store(StoreStudentViolationRequest $request): void
        {
            $data = $request->validated();
            $regulation = $this->regulation->show($data['regulation_id']);
            $student = $this->student->show($data['student_id']);
            $this->student->update($data['student_id'], ['point' => ($student->point_violation + $regulation->point) ]);
        }

        public function update(): void
        {

        }

        public function delete(): void
        {

        }
    }
