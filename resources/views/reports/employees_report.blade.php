@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@section('title')
    تقرير الموظفين - غالي سوفت للادارة الفواتير
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقرير
                الموظفين</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>خطا</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- row -->
<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">


            <div class="card-header pb-0">

                <form action="/Search_employees" method="POST" role="search" autocomplete="off">
                    {{ csrf_field() }}


                    <div class="col-lg-3">
                        <label class="rdiobox">
                            <input checked name="rdio" type="radio" value="1" id="type_div"> <span>بحث حسب الاسم
                                الثلاثي</span></label>
                    </div>


                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                        <label class="rdiobox"><input name="rdio" value="2" type="radio"><span>بحث حسب الرقم الوطني
                            </span></label>
                    </div><br><br>

                    <div class="row">

                        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="first_name">
                        <p class="mg-b-10">البحث حسب اسم الموظف</p>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="father_name">
                            <p class="mg-b-10">البحث حسب اسم الأب</p>
                            <input type="text" class="form-control" id="father_name" name="father_name">
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="last_name">
                            <p class="mg-b-10">البحث حسب نسبة الموظف</p>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                            </div><!-- col-4 -->

                        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="natunal_number">
                        <p class="mg-b-10">البحث حسب الرقم الوطني</p>
                            <input type="text" class="form-control" id="natunal_number" name="natunal_number">
                        </div><!-- col-4 -->

                    </div><br>

                    <div class="row">
                        <div class="col-sm-1 col-md-1">
                            <button class="btn btn-primary btn-block">بحث</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (isset($details))
                        <table id="example" class="table key-buttons text-md-nowrap" style=" text-align: center">
                            <thead>
                               
							                <tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">الاسم الأول</th>
												<th class="border-bottom-0"> النسبة</th>
												<th class="border-bottom-0"> اسم الأب</th>
												<th class="border-bottom-0">اسم الأم</th>
												<th class="border-bottom-0">نسبة الأم</th>
												<th class="border-bottom-0">الحالة الاجتماعية</th>
												<th class="border-bottom-0"> تاريخ الميلاد</th>
												<th class="border-bottom-0"> الرقم الوطني</th>
												
                                                <th class="border-bottom-0">مكان الاقامة</th>
                                                <th class="border-bottom-0">الدولة</th>
                                                <th class="border-bottom-0">العنوان</th>
                                                <th class="border-bottom-0"> رقم الموبايل</th>
                                                <th class="border-bottom-0">رقم الهاتف</th>
												<th class="border-bottom-0">الملاحظات</th>
												
											</tr>
                                            </thead>
                                         <tbody>
										 <?php $i = 0; ?>
                                          @foreach ($details as $Employees)
                                           <?php $i++; ?>
							                <tr>
												<td>{{ $i }}</td>
												<td>{{ $Employees->first_name }}</td>
												<td>{{ $Employees->last_name }}</td>
												<td>{{ $Employees->father_name }}</td>
												<td>{{ $Employees->mother_name }}</td>
												<td>{{ $Employees->mother_nick_name }}</td>
												<td>{{ $Employees->soishal_state }}</td>
												<td>{{ $Employees-> birth_date}}</td>
												<td>{{ $Employees->natual_number }}</td>
                                               
                                                <td>{{ $Employees->live_place }}</td>
                                                <td>{{ $Employees->state }}</td>
                                                <td>{{ $Employees->address }}</td>
                                                <td>{{ $Employees->mobile_number }}</td>
                                                <td>{{ $Employees->phone_number }}</td>
												<td>{{ $Employees->note }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();

</script>

<script>
    $(document).ready(function() {

        $('#natunal_number').hide();

        $('input[type="radio"]').click(function() {
            if ($(this).attr('id') == 'type_div') {
                $('#natunal_number').hide();
                $('#first_name').show();
                $('#father_name').show();
                $('#last_name').show();
            } else {
                $('#natunal_number').show();
                $('#first_name').hide();
                $('#father_name').hide();
                $('#last_name').hide();
            }
        });
    });

</script>


@endsection
