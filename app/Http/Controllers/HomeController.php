<?php

namespace App\Http\Controllers;
use App\Models\employees;
use App\Models\employee_details;
use App\Models\employee_attachments;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function index()
    {
      $count_all_employees =employees::count();
      $count_all_employee_details =employee_details::count();
      $count_all_employee_attachments =employee_attachments::count();


      if($count_all_employees == 0){
          $nspaemployees=0;
      }
      else{
          $nspaemployees = $count_all_employees;
      }

        if($count_all_employee_details == 0){
            $nspaemployeedetails=0;
        }
        else{
            $nspaemployeedetails = $count_all_employee_details;
        }

        if($count_all_employee_attachments == 0){
            $nspaemployeeattachments=0;
        }
        else{
            $nspaemployeeattachments = $count_all_employee_attachments;
        }


        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 200])
            ->labels(['عدد الموظفين ', 'عدد التحصيلات العلمية','عدد المرفقات '])
            ->datasets([
                [
                    "label" => "عدد الموظفين",
                    'backgroundColor' => ['#ec5858'],
                    'data' => [$nspaemployees]
                ],
                [
                    "label" => "عدد التحصيلات العلمية",
                    'backgroundColor' => ['#81b214'],
                    'data' => [$nspaemployeedetails]
                ],
                [
                    "label" => "عدد المرفقات",
                    'backgroundColor' => ['#ff9642'],
                    'data' => [$nspaemployeeattachments]
                ],


            ])
            ->options([]);


        $chartjs_2 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 340, 'height' => 200])
            ->labels(['عدد الموظفين', 'عدد التحصيلات العلمية','عدد المرفقات '])
            ->datasets([
                [
                    'backgroundColor' => ['#ec5858', '#81b214','#ff9642'],
                    'data' => [$nspaemployees, $nspaemployeedetails,$nspaemployeeattachments]
                ]
            ])
            ->options([]);

        return view('home', compact('chartjs','chartjs_2'));

    }
}
