<?php

namespace App\Http\Controllers;

use App\Models\employees;
use App\Models\employee_details;
use App\Models\employee_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\EmployeesExport;
use App\Imports\EmloyeeImport;
use Maatwebsite\Excel\Facades\Excel;
use session;
use App\Notifications\Add_employee;
use App\Notifications\Update_employee;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //نقوم بجلب البيانات كلها من جدول الموظفين لعرضها على الصفحة

      $employees = employees::all();
      return view('employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              
      $employees = employees::all();
      return view('employees.Add_Employee', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        employees::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'mother_nick_name' => $request->mother_nick_name,
            'soishal_state' => $request->soishal_state,
            'birth_date' => $request->birth_date,
            'natual_number' => $request->natual_number,
            'study_org' => $request->study_org,
            'type_of_certif' => $request->type_of_certif,
            'study_type' => $request->study_type,
            'study_place' => $request->study_place,
            'live_place' => $request->live_place,
            'state' => $request->state,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'phone_number' => $request->phone_number,
            'note' => $request->note,
        ]);
        $employee_id = employees::latest()->first()->id;//يجلب اخر اي دي من جدول الفواتير
        employee_details::create([
            'id_employee' => $employee_id,
            'study_org' => $request->study_org,
            'type_of_certif' => $request->type_of_certif,
            'study_type' => $request->study_type,
            'study_place' => $request->study_place,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);
        if ($request->hasFile('file')) {

            $employee_id = employees::latest()->first()->id;//يجلب اخر اي دي من جدول الفواتير
            $image = $request->file('file');
            $file_name = $image->getClientOriginalName();
            $natual_number = $request->natual_number;
            $attachments = new employee_attachments();
            $attachments->file_name = $file_name;//جيب اسم الملف
            $attachments->natual_number = $natual_number;//جيب رقم الفاتورة
            $attachments->Created_by = Auth::user()->name;//جيب اسم المستخدم
            $attachments->employee_id = $employee_id;//جيب اي دي الفاتورة
            $attachments->save();//احفظ

            // يقوم بخلق مجلد ضمن مجلد الببلك اسمه اتاتشمينتس وبداخله يتم خلق مجلد برقم الفاتورة وضمنه الملف 
            $imageName = $request->file->getClientOriginalName();
            $request->file->move(public_path('Attachments/' . $natual_number), $imageName);
        }
        $user = User::get();
        $employees = employees::latest()->first();
        Notification::send($user, new \App\Notifications\Add_employee($employees));

        session()->flash('Add');
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = employees::where('id', $id)->first();
        return view('employees.edit_employee', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employees = employees::findOrFail($id);
    
            $employees->first_name=$request->first_name;
            $employees->last_name=$request->last_name;
            $employees->father_name=$request->father_name;
            $employees->mother_name=$request->mother_name;
            $employees->mother_nick_name=$request->mother_nick_name;
            $employees->soishal_state=$request->soishal_state;
            $employees->birth_date=$request->employees_Date;
            $employees->natual_number=$request->natual_number;
            $employees->live_place=$request->live_place;
            $employees->state=$request->state;
            $employees->address=$request->address;
            $employees->mobile_number=$request->mobile_number;
            $employees->phone_number=$request->phone_number;
            $employees->note=$request->note;
            $employees->update();
    
            $user = User::get();
            $employees = employees::findOrFail($id);
         //   $employees = employees::latest()->first()->id;
            Notification::send($user, new \App\Notifications\Update_employee($employees));
        session()->flash('edit');
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->employees_id;
        $employees = employees::where('id', $id)->first();


        $employees->forceDelete();
        session()->flash('delete_employee');
        return redirect('/employees');

        }

        public function export()
    {

        return Excel::download(new EmployeesExport, 'employee.xlsx');

    }

    public function Print_employees($id)
    {
        $employees = employees::where('id', $id)->first();
        return view('employees.Print_employee',compact('employees'));
    }
    public function employee_study()
    {
        $employees = employees::all();   
        return view('employees.employee_details', compact('employees'));
    }

    public function MarkAsRead_all (Request $request)
    {
//سيجلب كل الاشعارات في قاعدة البيانات واذا وجد أنه يوجد اشعارات سيقوم بقراءتها كلها
        $userUnreadNotification= auth()->user()->unreadNotifications; 
        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }

    public function import(Request $request)
    {

        Excel::import(new EmloyeeImport,request()->file('file'));
        session()->flash('Import');
        return redirect('/employees');

    }

}
