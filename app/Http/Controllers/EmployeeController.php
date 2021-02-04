<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
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
        $employees=Employee::latest()->paginate(10);
        return view('employees.index',compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
        $employee=Employee::create([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'resignation_reason'=>$request->resignation_reason,
            'salary'=>$request->salary,
            'work_years'=>$request->work_years
        ]);
        return response()->json(['employee'=>$employee->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee=Employee::find($id);
        return view("employees.single",compact("employee"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee=Employee::find($id);
        return view("employees.edit",compact("employee"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, $id)
    {
        //
        $employee=Employee::find($id);
        $employee->name=$request->name;
        $employee->resignation_reason=$request->resignation_reason;
        $employee->gender=$request->gender;
        $employee->salary=$request->salary;
        $employee->work_years=$request->work_years;
        $employee->save();

        return response()->json(['status','updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee=Employee::find($id);
        $employee->delete();
        
        return response()->json(['status','deleted']);

    }

    


}
