<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ([
            'employees' => Employee::all(),
            'companies' => Company::all(),
        ]);

        return view('employees.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'company' => 'required',
            'name' => 'required'
        ]);

        // create Employee
        $employee = new Employee;
        $employee->company_id = $request->input('company');
        $employee->name = $request->input('name');
        $employee->save();

        return redirect('/')->with('success', 'Employee added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        $employee = Employee::find($employee->id);

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $data = ([
            'employee' => Employee::find($employee->id),
            'companies' => Company::all(),
        ]);

        return view('employees.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'company' => 'required'
        ]);

        //Edit Employee
        $employee = Employee::Find($employee->id);
        $employee->name = $request->input('name');
        $employee->company_id = $request->input('company');
        $employee->save();

        return redirect("/{$employee->id}")->with('success', 'Employee was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee = Employee::find($employee->id);

        $employee->delete();
        return redirect('/')->with('error', 'Employee deleted');
    }
}
