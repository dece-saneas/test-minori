<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Models\{TrainingType, Employee};
use App\Services\TrainingService;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request, TrainingService $service)
    {
        if ($request->ajax()) {
            return $service->getDataTables();
        }

        $trainingTypes = TrainingType::all();
        $employees = Employee::with('profile')->get();

        return view('trainings', compact('trainingTypes', 'employees'));
    }

    public function store(TrainingRequest $request, TrainingService $service)
    {
        $service->create($request->validated());

        return back();
    }
}
