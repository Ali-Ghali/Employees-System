@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تعديل بيانات موظف
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">ذاتية الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل بيانات موظف</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

 <!-- عند وجود اي خطأ يتم التحذير وهذه التعليمة خاصة بال فاليداشن -->
 @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
			
       <!-- عند الاضافة يتم اظهار رسالة تأكيد الاضافة -->

       @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تعديل بيانات الموظف بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
     <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('update_employees',$employees->id)}}"  method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الاسم الأول </label>
                                <input type="text" class="form-control" id="inputName" name="first_name"
                                    title="يرجي ادخال اسم الموظف " value="{{ $employees->first_name }}" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">النسبة</label>
                                <input type="text" class="form-control" id="inputName" name="last_name"
                                    title="يرجي ادخال نسبة الموظف " value="{{ $employees->last_name }}" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">اسم الأب</label>
                                <input type="text" class="form-control" id="inputName" name="father_name"
                                    title="يرجي ادخال اسم الأب " value="{{ $employees->father_name }}" required>
                            </div>


                        </div>

                        {{-- 2 --}}
                        <div class="row">

                        <div class="col">
                                <label for="inputName" class="control-label">اسم الأم</label>
                                <input type="text" class="form-control" id="inputName" name="mother_name"
                                    title="يرجي ادخال اسم الأم "  value="{{ $employees->mother_name }}" required>
                            </div>
                            
                        <div class="col">
                                <label for="inputName" class="control-label">نسبة الأم</label>
                                <input type="text" class="form-control" id="inputName" name="mother_nick_name"
                                    title="يرجي ادخال نسبة الأم " value="{{ $employees->mother_nick_name }}" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الحالة الأجتماعية</label>
                                <select name="soishal_state" id="soishal_state" class="form-control">
                                    <!--placeholder-->
                                    <option value="{{ $employees->soishal_state }}" >
                                    {{ $employees->soishal_state }}
                                    <option value="عازب/ة">عازب/ة</option>
                                    <option value="متزوج/ة">متزوج/ة</option>
                                    <option value="ارمل/ة">ارمل/ة</option>
                                    <option value="مطلق/ة">مطلق/ة</option>
                                </select>
                            </div>

                        </div>


                        {{-- 3 --}}

                        <div class="row">

                        <div class="col">
                                <label>تاريخ الميلاد</label>
                                <input class="form-control fc-datepicker" name="employees_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ $employees->birth_date }}" required> 
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الرقم الوطني</label>
                                <input type="text" class="form-control" id="inputName" name="natual_number"
                                    title="يرجي ادخال الرقم الوطني " value="{{ $employees->natual_number }}">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">مكان الاقامة</label>
                                <input type="text" class="form-control" id="inputName" name="live_place"
                                    title="يرجي ادخال مكان الاقامة " value="{{ $employees->live_place }}">
                            </div>


                        </div>
                        
                        {{-- 4 --}}

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">الدولة</label>
                                <input type="text" class="form-control" id="inputName" name="state"
                                    title="يرجي ادخال الدولة  " value="{{ $employees->state }}">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">العنوان</label>
                                <input type="text" class="form-control" id="inputName" name="address"
                                    title="يرجي ادخال العنوان  " value="{{ $employees->address }}">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">رقم الموبايل</label>
                                <input type="text" class="form-control" id="inputName" name="mobile_number"
                                    title="يرجي ادخال رقم الموبايل " value="{{ $employees->mobile_number }}">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">رقم الهاتف</label>
                                <input type="text" class="form-control" id="inputName" name="phone_number"
                                    title="يرجي ادخال رقم الهاتف " value="{{ $employees->phone_number }}">
                            </div>


                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3">{{ $employees->note }}</textarea>
                            </div>
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>

                    </form>
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

      <!-- سكربت من اجل تنسيق التاريخ -->
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
        </script>

@endsection
