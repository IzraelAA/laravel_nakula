<?php

namespace App\Imports;

use App\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Guru([
            'id_sekolah'     => $row[0],
            'nama_guru'    => $row[1],
            'nik'    => $row[2],
            'password'    => $row[3],
        ]);
    }
}
