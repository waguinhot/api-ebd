<?php

namespace Src\Modules\Student\Services;

use Src\Modules\Student\Models\Student;

class StudentService {
    public function storeStudent(
        string $name,
        string $cpf,
        string $birth_date,
        string $email,
        string $phone,
        string $address,
        string $cep,
        string $marital_status,
        string $responsibility
    ){

        if(!$this->verifyCpf($cpf)){
            return false;
        }

        if(!$this->verifyEmail($email)){
            return false;
        }

        $newStudent = new Student();
        $newStudent->name = $name;
        $newStudent->cpf = $cpf;
        $newStudent->birth_date = $birth_date;
        $newStudent->email = $email;
        $newStudent->phone = $phone;
        $newStudent->address = $address;
        $newStudent->cep = $cep;
        $newStudent->marital_status = $marital_status;
        $newStudent->responsibility = $responsibility;
        $newStudent->save();

        return $newStudent;
    }

    private function verifyCpf(string $cpf){
        $user = Student::where('cpf', $cpf)->first();

        if($user){
            return false;
        }

        return true;
    }

    private function verifyEmail(string $email){
        $user = Student::where('email', $email)->first();

        if($user){
            return false;
        }

        return true;
    }
}
