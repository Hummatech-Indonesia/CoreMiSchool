<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Models\EmployeeJournal;
use App\Http\Requests\StoreEmployeeJournalRequest;
use App\Http\Requests\UpdateEmployeeJournalRequest;
use App\Services\EmployeeJournalService;

class EmployeeJournalController extends Controller
{
    private EmployeeJournalInterface $employeeJournal;
    private EmployeeJournalService $service;

    public function __construct(EmployeeJournalInterface $employeeJournal, EmployeeJournalService $service)
    {
        $this->employeeJournal = $employeeJournal;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeJournals = $this->employeeJournal->getEmployee(auth()->user()->id);
        return view('staff.pages.journal.index', compact('employeeJournals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeJournalRequest $request)
    {
        $data = $this->service->store($request);
        $this->employeeJournal->store($data);
        return redirect()->back()->with('success', 'Berhasil menambah jurnal.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeJournal $employeeJournal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeJournal $employeeJournal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeJournalRequest $request, EmployeeJournal $employeeJournal)
    {
        $data = $this->service->update($request);
        $this->employeeJournal->update($employeeJournal->id, $data);
        return redirect()->back()->with('success', 'Berhasil mengedit jurnal.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeJournal $employeeJournal)
    {
        $this->employeeJournal->delete($employeeJournal->id);
        return redirect()->back()->with('success', 'Berhasil menghapus jurnal.');
    }
}
