@extends('layouts.master')
@section('css')
  <!-- يقوم هذا الستايل باخفاء زر الطباعة في حال الطباعة لكي لايطبع الزر على الورق -->
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection
@section('title')
    معاينه طباعة بيانات الموظف
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">ذاتية الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    معاينة طباعة بيانات الموظف</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">بيانات الموظف</h1>
                            <div class="billed-from">
                                <h6>طباعة بيانات موظف</h6>
                                <p>سوريا - دمشق - مزة جبل 86<br>
                                    هاتف: 0994902104<br>
                                    alighali42@hotmail.com </p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات الموظف</label>
                                <div class="billed-to">
                                    <h6>طباعة معلومات الموظف</h6>
                                    <p><br>
                                        <br>
                                       </p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات الموظف</label>
                                <p class="invoice-info-row"><span>اسم الموظف</span>
                                    <span>{{ $employees->first_name }}</span></p>
                                <p class="invoice-info-row"><span> النسبة</span>
                                    <span>{{ $employees->last_name }}</span></p>
                                <p class="invoice-info-row"><span>اسم الأب</span>
                                    <span>{{ $employees->father_name }}</span></p>
                                <p class="invoice-info-row"><span>اسم الأم</span>
                                    <span>{{ $employees->mother_name }}</span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">#</th>
                                        <th class="wd-40p">نسبة الأم</th>
                                        <th class="tx-center">الحالة الاجتماعية</th>
                                        <th class="tx-right">تاريخ الميلاد</th>
                                        <th class="tx-right">الرقم الوطني</th>
                                        <th class="tx-right">مكان الاقامة</th>
                                        <th class="tx-right"> الدولة</th>
                                        <th class="tx-right">العنوان </th>
                                        <th class="tx-right">رقم الموبايل</th>
                                        <th class="tx-right">رقم الهاتف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="tx-12">{{ $employees->mother_nick_name }}</td>
                                        <td class="tx-center">{{ $employees->soishal_state }}</td>
                                        <td class="tx-right">{{ $employees->birth_date }}</td>
                                      
                                        <td class="tx-right">{{ $employees->natual_number }}</td>
                                        <td class="tx-right">{{ $employees->live_place }}</td>
                                        <td class="tx-right">{{ $employees->state }}</td>
                                        <td class="tx-right">{{ $employees->address }}</td>
                                        <td class="tx-right">{{ $employees->mobile_number }}</td>
                                        <td class="tx-right">{{ $employees->phone_number }}</td>
                                    </tr>

                                    <tr>
                                        <td class="valign-middle" colspan="2" rowspan="4">
                                            <div class="invoice-notes">
                                                <label class="main-content-label tx-13">#</label>

                                            </div><!-- invoice-notes -->
                                        </td>
                                        <td class="tx-right">الملاحظات</td>
                                        <td class="tx-right" colspan="2"> {{ $employees->note }}</td>
                                    </tr>
                                
                                    
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">



                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>طباعة</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

  <!-- يقوم هذا السكربت بعملية الطباعة وسوف يطبع فقط المحتوى وليس كامل الصفحة مع السايدبار وغيره -->
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection
