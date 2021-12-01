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
    اضافة موظف
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">ذاتية الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة موظف</span>
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

       @if (session()->has('Add'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة الموظف بنجاح",
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
                    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الاسم الأول </label>
                                <input type="text" class="form-control" id="inputName" name="first_name"
                                    title="يرجي ادخال اسم الموظف " required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">النسبة</label>
                                <input type="text" class="form-control" id="inputName" name="last_name"
                                    title="يرجي ادخال نسبة الموظف " required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">اسم الأب</label>
                                <input type="text" class="form-control" id="inputName" name="father_name"
                                    title="يرجي ادخال اسم الأب " required>
                            </div>


                        </div>

                        {{-- 2 --}}
                        <div class="row">

                        <div class="col">
                                <label for="inputName" class="control-label">اسم الأم</label>
                                <input type="text" class="form-control" id="inputName" name="mother_name"
                                    title="يرجي ادخال اسم الأم " required>
                            </div>
                            
                        <div class="col">
                                <label for="inputName" class="control-label">نسبة الأم</label>
                                <input type="text" class="form-control" id="inputName" name="mother_nick_name"
                                    title="يرجي ادخال نسبة الأم " required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الحالة الأجتماعية</label>
                                <select name="soishal_state" id="soishal_state" class="form-control">
                                    <!--placeholder-->
                                    <option value="">حدد الحالة الاجتماعية</option>
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
                                <input class="form-control fc-datepicker" name="birth_date" placeholder="YYYY-MM-DD"
                                    type="text"  required> 
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الرقم الوطني</label>
                                <input type="text" class="form-control" id="inputName" name="natual_number"
                                    title="يرجي ادخال الرقم الوطني " >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">المؤسسة التعليمية </label>
                                <input type="text" class="form-control" id="inputName" name="study_org"
                                    title="يرجي ادخال اسم المؤسسة التعليمية " required>
                            </div>


                        </div>
                        {{--4 --}}

                        <div class="row">
                        <div class="col">
                                <label for="inputName" class="control-label">نوع الشهادة</label>
                                <input type="text" class="form-control" id="inputName" name="type_of_certif"
                                    title="يرجي ادخال نوع الشهادة " required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> الاختصاص</label>
                                <input type="text" class="form-control" id="inputName" name="study_type"
                                    title="يرجي ادخال الاختصاص  " required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">مكان الدراسة</label>
                                <input type="text" class="form-control" id="inputName" name="study_place"
                                    title="يرجي ادخال مكان الدراسة " required>
                            </div>



                        </div>

                        {{--5 --}}

                        <div class="row">
                        <div class="col">
                                <label for="inputName" class="control-label">مكان الاقامة</label>
                                <input type="text" class="form-control" id="inputName" name="live_place"
                                    title="يرجي ادخال مكان الاقامة " required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> الدولة</label>
                                <input type="text" class="form-control" id="inputName" name="state"
                                    title="يرجي ادخال الدولة  " required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">العنوان</label>
                                <input type="text" class="form-control" id="inputName" name="address"
                                    title="يرجي ادخال العنوان " required>
                            </div>



                        </div>
                         {{--6 --}}

                        <div class="row">
                        <div class="col">
                                <label for="inputName" class="control-label">رقم الموبايل</label>
                                <input type="text" class="form-control" id="inputName" name="mobile_number"
                                    title="يرجي ادخال مكان الاقامة " required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> رقم الهاتف</label>
                                <input type="text" class="form-control" id="inputName" name="phone_number"
                                    title="يرجي ادخال الدولة  " required>
                            </div>



                        </div>
                        
                        {{-- 7 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div><br>

                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <div class="col-sm-12 col-md-12" >
                            <input type="file" name="file" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
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
