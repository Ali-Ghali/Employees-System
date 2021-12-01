<?php

namespace App\Http\Controllers;

use App\Models\employee_details;
use App\Models\employee_attachments;
use Illuminate\Http\Request;
use App\Models\employees;
use Illuminate\Support\Facades\Auth;
class EmployeeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_details = employee_details::all();   
        return view('employees.employee_details', compact('employee_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_details = employee_details::all();
        return view('employees.Add_Employee_study', compact('employee_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $employee_details=new employee_details();
        $employee_details->study_org=$request->study_org;
        $employee_details->type_of_certif=$request->type_of_certif;
        $employee_details->study_type=$request->study_type;
        $employee_details->study_place=$request->study_place;
        $employee_details->note=$request->note;
        $employee_details->id_employee = $request->id_employee;
        $employee_details->user = Auth::user()->name;
        $employee_details->save();
        session()->flash('Add', 'تم اضافة التحصيل العلمي بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee_details  $employee_details
     * @return \Illuminate\Http\Response
     */
    public function show(employee_details $employee_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee_details  $employee_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = employees::where('id',$id)->first();
        $details  = employee_details::where('id_employee',$id)->get();
        $attachments  = employee_attachments::where('employee_id',$id)->get();

        return view('employees.employee_details',compact('employees','details','attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee_details  $employee_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee_details = employee_details::findOrFail($id);
    
        $employee_details->study_org=$request->study_org;
        $employee_details->type_of_certif=$request->type_of_certif;
        $employee_details->study_type=$request->study_type;
        $employee_details->study_place=$request->study_place;
        $employee_details->note=$request->note;
        $employee_details->user = Auth::user()->name;
        $employee_details->update();


    session()->flash('edit');
    return redirect('/employees');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee_details  $employee_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee_details = employee_details::findOrFail($request->employees_id);

     
        $employee_details->delete();
        session()->flash('delete','تم حذف التحصيل العلمي بنجاح');
        return back();
        }

        public function edit_employee_details($id)
        {
           
            $employee_details  = employee_details::where('id',$id)->first();
            
    
            return view('employees.update_employee_details',compact('employee_details'));
        }
        
        
}
