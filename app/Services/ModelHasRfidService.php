<?php

namespace App\Services;

use App\Contracts\Interfaces\RfidInterface;
use App\Http\Requests\StoreModelHasRfidRequest;

class ModelHasRfidService
{
    private RfidInterface $rfid;

    public function __construct(RfidInterface $rfid) {
        $this->rfid = $rfid;
    }

    public function check(StoreModelHasRfidRequest $request): array|bool
    {
        $data = $request->validated();
        $result = $this->rfid->where($data['rfid']);

        return $result;
    }
}
