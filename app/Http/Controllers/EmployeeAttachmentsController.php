<?php

namespace App\Http\Controllers;

use App\Models\employee_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use File;
class EmployeeAttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [

        'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
            'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);
        
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();

        $attachments =  new employee_attachments();
        $attachments->file_name = $file_name;
        $attachments->natual_number = $request->natual_number;
        $attachments->employee_id = $request->employee_id;
        $attachments->Created_by = Auth::user()->name;
        $attachments->save();
           
        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments/'. $request->natual_number), $imageName);
        
        session()->flash('Add', 'تم اضافة المرفق بنجاح');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee_attachments  $employee_attachments
     * @return \Illuminate\Http\Response
     */
    public function show(employee_attachments $employee_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee_attachments  $employee_attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(employee_attachments $employee_attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee_attachments  $employee_attachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee_attachments $employee_attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee_attachments  $employee_attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee_attachments = employee_attachments::findOrFail($request->id_file);
        $employee_attachments->delete();
        Storage::disk('public_uploads')->delete($request->employee_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

//هذا التابع من لارافيل بحيث يمكننا من عرض المرفق في المتصفح
//public_uploads ولعمله نذهب الى مجلد الكونفيك وضمنه نفتح ملف اسمه فايل سيستم ونعمل بداخله 
//وذلك لدلاله الى مكان وجود المرفق بالمجلدات
    public function open_file($natual_number,$file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($natual_number.'/'.$file_name);
        return response()->file($files);
    }

        //نفس الشرح السابق ولكن بدلا من عمل عرض سيقوم بعملبة التحميل
        public function get_file($natual_number,$file_name)

        {
            $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($natual_number.'/'.$file_name);
            return response()->download( $contents);
        }
}
//هذا التابع من لارافيل بحيث يمكننا من عرض المرفق في المتصفح
//public_uploads ولعمله نذهب الى مجلد الكونفيك وضمنه نفتح ملف اسمه فايل سيستم ونعمل بداخله 
//وذلك لدلاله الى مكان وجود المرفق بالمجلدات