<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function data()
    {
        return DataTables::of(Employee::query())
            ->addColumn('action', 'action')
            ->make(true);
    }
}
