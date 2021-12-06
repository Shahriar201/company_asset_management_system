<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function view(){
        $allData = Employee::all();
        return view('backend.employee.view-employee', compact('allData'));
    }

    public function add(){
        return view('backend.employee.add-employee');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:employees',
            'department' => 'required|unique:employees',
            'email' => 'required|unique:employees',
            'gender' => 'required'
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->department = $request->department;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->created_by = Auth::user()->id;
        $employee->save();

        return redirect()->route('employees.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){

        $editData = Employee::find($id);

        return view('backend.employee.add-employee', compact('editData'));
    }

    public function update(EmployeeRequest $request, $id){

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->department = $request->department;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->updated_by = Auth::user()->id;
        $employee->save();

        return redirect()->route('employees.view')->with('success', 'Data updated successfully');

    }

    public function delete(Request $request){
        $employee = Employee::find($request->id);
        $employee->delete();

        return redirect()->route('employees.view')->with('success', 'Data deleted successfully');
    }
}
