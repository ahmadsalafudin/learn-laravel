<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('basic');
    }

    public function data()
    {
        $data = DB::table('employees')->join('users', 'employees.user_id', 'users.id')
            ->select(['employees.id', 'employees.nik', 'employees.full_name', 'users.email', 'employees.pob', 'employees.gender', 'employees.status']);

        return DataTables::of($data)
            ->addColumn('checkboxes', 'checkbox')
            ->addColumn('action', 'action')
            ->make(true);
    }

    public function detail()
    {
        return view('detail');
    }


    public function detailData()
    {
        $data = DB::table('employees')->join('users', 'employees.user_id', 'users.id')
            ->select(['employees.id', 'employees.nik', 'employees.full_name', 'users.email', 'employees.pob', 'employees.gender', 'employees.status']);

        return DataTables::of($data)
            ->addColumn('action', 'action')
            ->addColumn('checkbox', function ($model) {
                return '<input type="checkbox">';
            })
            ->make(true);
    }
}
