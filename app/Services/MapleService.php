<?php

namespace App\Services;

use App\Http\Requests\StoreMapleRequest;
use App\Http\Requests\UpdateMapleRequest;
use App\Models\Maple;

class MapleService
{
    public function store(StoreMapleRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function update(Maple $maple, UpdateMapleRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function delete(Maple $maple)
    {
        //
    }
}
