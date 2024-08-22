<?php

namespace App\Imports;

use App\Contracts\Interfaces\RegulationInterface;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class RegulationImport implements ToModel
{
    private RegulationInterface $regulation;

    public function __construct(RegulationInterface $regulation)
    {
        $this->regulation = $regulation;
    }

    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        if (in_array($row[0], ['NAMA PELANGGARAN', 'Rambut Panjang (Jangan Dihapus)']) || $row[0] == null) {
            return null;
        }

        $regulation = $this->regulation->where($row[0]);

        if ($regulation) {
            session()->flash('warning', "Pelanggaran '{$row[0]}' sudah tersedia.");
            return null;
        }

        $data = [
            'violation' => $row[0],
            'point' => $row[1],
        ];

        $this->regulation->store($data);

        return null;
    }
}
