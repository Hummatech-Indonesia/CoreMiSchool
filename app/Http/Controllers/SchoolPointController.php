<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SchoolPointInterface;
use App\Models\SchoolPoint;
use App\Http\Requests\UpdateSchoolPointRequest;

class SchoolPointController extends Controller
{
    private SchoolPointInterface $schoolPoint;

    public function __construct(SchoolPointInterface $schoolPoint)
    {
        $this->schoolPoint = $schoolPoint;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $point = $this->schoolPoint->get();

        return view('', compact('point'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolPointRequest $request, SchoolPoint $schoolPoint)
    {
        $this->schoolPoint->update($schoolPoint->id, $request->validated());
        return redirect()->back()->with('success', 'Point berhasil diperbarui');
    }
}
