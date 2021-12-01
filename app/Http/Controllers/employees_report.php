<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
class employees_report extends Controller
{
    public function index(){

        return view('reports.employees_report');
           
       }
   
       public function Search_employees(Request $request){
   
        $rdio = $request->rdio;
   
   
        // في حالة البحث حسب الاسم الثلاثي 
           
           if ($rdio == 1) {
              //عند اختيار الكل بدون وضع تواريخ سيجلب لنا جميع الموظفين ويعرضها بالجدول وكلمة فرست نيم مأخوذة من النيم تبع الانبوت
            if($request->first_name  && $request->father_name =='' && $request->last_name ==''){
                $employees = employees::select('*')->where('first_name','=',$request->first_name)->get();
                $first_name = $request->first_name;
                return view('reports.employees_report',compact('first_name'))->withDetails($employees);
           
            }

            if($request->first_name =='' && $request->father_name  && $request->last_name ==''){
                $employees = employees::select('*')->where('father_name','=',$request->father_name)->get();
                $father_name = $request->father_name;
                return view('reports.employees_report',compact('father_name'))->withDetails($employees);
           
            }

            if($request->first_name =='' && $request->father_name ==''  && $request->last_name){
                $employees = employees::select('*')->where('last_name','=',$request->last_name)->get();
                $last_name = $request->last_name;
                return view('reports.employees_report',compact('last_name'))->withDetails($employees);
           
            }
            //يمكننا هنا عند اختيار الكل يمكننا البحث بالكل 
            if($request->first_name && $request->father_name  && $request->last_name){ 
                
                $first_name = $request->first_name;
                $father_name = $request->father_name;
                $last_name = $request->last_name;
                $employees = employees::select('*')->where('first_name','=',$request->first_name)->where('father_name','=',$request->father_name)->where('last_name','=',$request->last_name)->get();
              
                return view('reports.employees_report',compact('first_name','first_name','first_name'))->withDetails($employees);
            }
        
               
           } 
           
       //====================================================================
           
       // في البحث برقم الوطني
           else {
               
               $employees = employees::select('*')->where('natual_number','=',$request->natunal_number)->get();
               return view('reports.employees_report')->withDetails($employees);
               
           }
       
           
            
       }   
       
        
       
}
