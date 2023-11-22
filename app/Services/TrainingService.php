<?php

namespace App\Services;

use App\Models\Training;
use Yajra\DataTables\DataTables;

class TrainingService
{    public function getDataTables()
    {
        $query = Training::query()->with(['type', 'employee.profile']);

        return DataTables::of($query)
            ->addColumn('certificate_type', fn(Training $training) => $training->type->type)
            ->addColumn('nip', fn(Training $training) => $training->employee->profile->nip)
            ->toJson();
    }

    public function create(array $data): void
    {
        Training::create([
            'type_id'   => $data['type'],
            'certificate_date'  =>  $data['date'],
            'employee_id'  =>  $data['employee']
        ]);
    }
}
