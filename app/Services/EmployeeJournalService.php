<?php

    namespace App\Services;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Http\Requests\StoreEmployeeJournalRequest;
use App\Http\Requests\UpdateEmployeeJournalRequest;

    class EmployeeJournalService
    {
        private EmployeeInterface $employee;

        public function __construct(EmployeeInterface $employee)
        {
            $this->employee = $employee;
        }

        public function store(StoreEmployeeJournalRequest $request): array|bool
        {
            $data = $request->validated();
            $user = auth()->user();
            $employee = $this->employee->getByUser($user->id);

            return [
                'employee_id' => $employee->id,
                'title' => $data['title'],
                'description' => $data['description'],
            ];
        }

        public function update(UpdateEmployeeJournalRequest $request): array|bool
        {
            $data = $request->validated();
            $user = auth()->user();
            $employee = $this->employee->getByUser($user->id);

            return [
                'employee_id' => $employee->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'is_finish' => true,
            ];
        }
    }
