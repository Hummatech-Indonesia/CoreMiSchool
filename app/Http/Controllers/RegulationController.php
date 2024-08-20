<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Http\Requests\UpdateRegulationRequest;
use App\Http\Requests\StoreRegulationRequest;
use App\Models\Regulation;

class RegulationController extends Controller
{
    private RegulationInterface $regulation;
    private SchoolPointInterface $schoolPoint;

    public function __construct(RegulationInterface $regulation, SchoolPointInterface $schoolPoint)
    {
        $this->regulation = $regulation;
        $this->schoolPoint = $schoolPoint;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regulations = $this->regulation->get();
        $maxPoint = $this->schoolPoint->get();
        return view('school.new.violation.index', compact('regulations', 'maxPoint'));
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
    public function store(StoreRegulationRequest $request)
    {
        $this->regulation->store($request->validated());
        return redirect()->back()->with('success', 'Berhasil membuat peraturan baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regulation $regulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regulation $regulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegulationRequest $request, Regulation $violation)
    {
        $this->regulation->update($violation->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil update peraturan');
    }

    /**
     * Remove the specified resource from storage.  
     */
    public function destroy(Regulation $violation)
    {
        $this->regulation->delete($violation->id);
        return redirect()->back()->with('success', 'Berhasil menghapus peraturan');
    }
}
