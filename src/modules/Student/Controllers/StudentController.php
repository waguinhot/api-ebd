<?php

namespace Src\Modules\Student\Controllers;

use App\Http\Controllers\Controller;
use Src\Modules\Student\Requests\StoreStudentRequest;
use Src\Modules\Student\Services\StudentService;

class StudentController extends Controller
{
    public function store(StoreStudentRequest $request){
        $newStudent = new StudentService();
        $student = $newStudent->storeStudent(
            $request->name,
            $request->cpf,
            $request->birth_date,
            $request->email,
            $request->phone,
            $request->address,
            $request->cep,
            $request->marital_status,
            $request->responsibility
        );

        if(!$student){
            return response()->json(['error' => 'Student not created, please verify email or cpf'], 400);
        }

        return response()->json($student, 201);
    }
}
