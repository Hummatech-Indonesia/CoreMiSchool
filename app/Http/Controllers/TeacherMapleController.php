<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TeacherMapleInterface;
use App\Models\TeacherMaple;
use App\Http\Requests\StoreTeacherMapleRequest;
use App\Http\Requests\UpdateTeacherMapleRequest;

class TeacherMapleController extends Controller
{
    private TeacherMapleInterface $teacherMaple;

    public function __construct(TeacherMapleInterface $teacherMaple)
    {
        $this->teacherMaple = $teacherMaple;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherMaples = $this->teacherMaple->get();
        return view('', compact('teacherMaples'));
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
    public function store(StoreTeacherMapleRequest $request)
    {
        $data = $request->validated();
        $this->teacherMaple->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahahkan guru mapel');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherMaple $teacherMaple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherMaple $teacherMaple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherMapleRequest $request, TeacherMaple $teacherMaple)
    {
        $data = $request->validated();
        $this->teacherMaple->update($teacherMaple->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbaiki guru mapel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherMaple $teacherMaple)
    {
        $this->teacherMaple->delete($teacherMaple->id);
        return redirect()->back()->with('success', 'Berhasil menghapus guru mapel');
    }
}
