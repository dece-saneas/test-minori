<?php

namespace App\Services;

use App\Models\{Employee, EmployeeProfile, Training};
use Yajra\DataTables\DataTables;

class EmployeeService
{
    public function getDataTables()
    {
        $query = Employee::query()->with(['profile', 'trainings', 'trainings.type']);

        return DataTables::of($query)
            ->addColumn('nip', fn(Employee $employee) => $employee->profile->nip)
            ->addColumn('name', fn(Employee $employee) => $employee->profile->name)
            ->addColumn('certificates', function(Employee $employee) {
                return $employee->trainings->sortByDesc('id')->map(function(Training $training) {
                    return $training->type->type;
                })->implode('<br>');
            })
            ->addColumn('certificate_date', function(Employee $employee) {
                return $employee->trainings->sortByDesc('id')->map(function(Training $training) {
                    return $training->certificate_date;
                })->implode('<br>');
            })
            ->rawColumns(['certificates', 'certificate_date'])
            ->toJson();
    }

    public function create(array $data): void
    {
        $profile = EmployeeProfile::create($data);

        Employee::create([
            'profile_id'    => $profile->id
        ]);
    }
}
