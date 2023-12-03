<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments=Department::all();
        $quest= $request->department_id;
        if(!empty($quest)){
        $employees = Employee::where("department_id","like",$quest)->paginate(5);
        }else{
        // $data['movies'] = Movie::;

        $employees = Employee::orderBy('id','desc')->paginate(5);
        }
       
        return view("employees.index", compact("employees","departments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        return view("employees.create", compact("departments"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required",
            "salary"=> "required",
            "department_id"=> "required",
           ]);
        //    dd($request->all());
        $employee = Employee::create($request->all());
        return redirect()->route("employees.index")->with("success","added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments=Department::all();
        return view("employees.edit", compact("employee","departments"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            "name"=> "required",
            "salary"=> "required",
            "department_id"=> "required",]);
        // $employee=Employee::find($employee);

        $employee->update($request->all());
        return redirect()->route("employees.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route("employees.")->with("success","");
    }
}
