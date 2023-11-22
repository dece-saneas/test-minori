<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request, EmployeeService $service)
    {
        if ($request->ajax()) {
            return $service->getDataTables();
        }

        return view('employees');
    }

    public function store(EmployeeRequest $request, EmployeeService $service)
    {
        $service->create($request->validated());

        return back();
    }
}
