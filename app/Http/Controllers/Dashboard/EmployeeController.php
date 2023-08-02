<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::pluck('name', 'id');

        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        try {
            $validatedData = $request->validated();
            Employee::create($validatedData);

            return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong. Please try again later.');
        }
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::pluck('name', 'id');
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $validatedData = $request->validated();
            $employee->update($validatedData);

            return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong. Please try again later.');
        }
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
