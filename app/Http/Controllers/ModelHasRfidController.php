<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Models\ModelHasRfid;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Http\Requests\UpdateModelHasRfidRequest;

class ModelHasRfidController extends Controller
{
    private ModelHasRfidInterface $modelHasRfid;

    public function __construct(ModelHasRfidInterface $modelHasRfid)
    {
        $this->modelHasRfid = $modelHasRfid;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreModelHasRfidRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelHasRfid $modelHasRfid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelHasRfid $modelHasRfid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModelHasRfidRequest $request, ModelHasRfid $modelHasRfid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelHasRfid $modelHasRfid)
    {
        //
    }
}
