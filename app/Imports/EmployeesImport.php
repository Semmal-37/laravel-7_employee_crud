<?php

namespace App\Imports;

use App\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new Employee([
           'firstname'     => $row[0],
           'lastname'    => $row[1],
           'date_of_birth'    => $row[2],
           'education_qualification' => $row[3],
           'address'    => $row[4],
           'email'    => $row[5],
           'phone'    => $row[6],
        ]);
    }
}