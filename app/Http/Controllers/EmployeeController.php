<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;


class EmployeeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee:: orderBy('id')->paginate(10);
  
        return view('employees.index',compact('employees'))
            ->with('i', (request()->input('page', 1)) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
      $employee = new Employee;
    

      $employee->firstname = $request->firstname;
      $employee->lastname = $request->lastname;
      $employee->date_of_birth = $request->date_of_birth;
      $employee->education_qualification = $request->education_qualification;
      $employee->address = $request->address;
      $employee->email = $request->email;
      $employee->phone = $request->phone;
      $employee->photo = $request->file('photo')->store('public/photo');
      $employee->resume = $request->file('resume')->store('resume');

      $employee->save();
      
      return response()->json(['success'=>'Form is successfully submitted!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
       $employee = $employee->toArray();
       return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {   
        $employee = $employee->toArray();
        return view('employees.edit',compact('employee'));
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

       $employee->update($request->all());
  
       return redirect()->route('employees.show', $employee)
                        ->with('success','Employee Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
       $employee->delete();
  
       return redirect()->route('employees.index')
                        ->with('success','Employee Data deleted successfully');
                         
    }


    public function export()
    {
        return \Excel::download(new EmployeesExport, 'employees.xlsx');
        return redirect()->route('employees.index')
                        ->with('success','Employee Data Exported  successfully');
    }


    public function getImport()
    {
        return view('employees.import');
    }


    public function postImport()
    {
        \Excel::import(new EmployeesImport, request('employee_file'));
    }
}
