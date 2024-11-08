<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeJournalResource;
use App\Http\Resources\RegulationResource;
use App\Models\User;
use App\Services\EmployeeJournalService;
use Illuminate\Http\Request;

class StafApiController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;
    private SchoolPointInterface $schoolPoint;
    private StudentInterface $student;
    private EmployeeInterface $employee;
    private EmployeeJournalService $journalService;
    private EmployeeJournalInterface $employeeJournal;
    private RegulationInterface $regulation;

    public function __construct(
        StudentViolationInterface $studentViolation,
        StudentRepairInterface $studentRepair,
        SchoolPointInterface $schoolPoint,
        StudentInterface $student,
        EmployeeInterface $employee,
        EmployeeJournalService $journalService,
        EmployeeJournalInterface $employeeJournal,
        RegulationInterface $regulation,
    )
    {
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
        $this->schoolPoint = $schoolPoint;
        $this->student = $student;
        $this->employee = $employee;
        $this->journalService = $journalService;
        $this->employeeJournal = $employeeJournal;
        $this->regulation = $regulation;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $approved = $this->studentRepair->count_approved('1');
        $process = $this->studentRepair->count_approved('0');
        $not_process = $this->studentRepair->count_approved(null);
        $employeeJournals = $this->employeeJournal->getEmployee($user->id, 'take_2');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'approved' => $approved,
            'process' => $process,
            'not_process' => $not_process,
            'journals' => EmployeeJournalResource::collection($employeeJournals),
        ]]);
    }

    public function history_journals(User $user)
    {
        $employeeJournals = $this->employeeJournal->getEmployee($user->id, 'get');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'journals' => EmployeeJournalResource::collection($employeeJournals),
        ]]);
    }

    public function create_journal(User $user, Request $request)
    {
        try {
            $data = $this->journalService->store_api($request, $user);
            $this->employeeJournal->store($data);
            return response()->json(['status' => 'success', 'message' => "Data Berhasil di Create", 'code' => 200]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'success', 'message' => "Data Gagal di Create", 'code' => 500]);
        }
    }

    public function overview_header()
    {
        $student_violation = $this->studentViolation->countByStudent();
        $maxPoint = $this->schoolPoint->getMaxPoint();
        $studentHighPoint = $this->student->highestPoint($maxPoint);

        $countViolation = $this->studentViolation->count('week');
        $countRepair = $this->studentRepair->count();

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'student_violation' => $student_violation,
            'student_high_point' => $studentHighPoint,
            'violation_in_week' => $countViolation,
            'repair_in_week' => $countRepair,
        ]]);
    }

    public function max_point()
    {
        $maxPoint = $this->schoolPoint->getMaxPoint();
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'max_point' => $maxPoint]);
    }

    public function list_violation()
    {
        $regulations = $this->regulation->latest();
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => RegulationResource::collection($regulations),]);
    }

    public function list_repair()
    {
        
    }
}
