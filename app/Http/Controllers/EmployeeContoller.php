<?php

// app/Http/Controllers/EmployeeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('welcome', ['employees' => $employees]);
    }
}
