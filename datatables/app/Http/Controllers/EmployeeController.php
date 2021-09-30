<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('employee');
    }

    public function index2()
    {
        $data['data'] = DataTables::of(Employee::query())->make(true);
        return view('employee', $data);
    }
}
