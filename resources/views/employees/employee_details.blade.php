@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل الموظف
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الموظف</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    الموظف</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">التحصيل العلمي</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4"><!-- التاب رقم 4 خاص بمعلومات الموظف -->
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">الاسم الأول</th>
                                                            <td>{{ $employees->first_name }}</td>
                                                            <th scope="row">النسبة</th>
                                                            <td>{{ $employees->last_name }}</td>
                                                            <th scope="row">اسم الأب</th>
                                                            <td>{{ $employees->father_name }}</td>
                                                            <th scope="row">اسم الأم</th>
                                                            <td>{{ $employees->mother_name }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">نسبة الأم</th>
                                                            <td>{{ $employees->mother_nick_name }}</td>
                                                            <th scope="row">الحالة الاجتماعية</th>
                                                            <td>{{ $employees->soishal_state }}</td>
                                                            <th scope="row">تاريخ الميلاد</th>
                                                            <td>{{ $employees->birth_date }}</td>
                                                            <th scope="row">الرقم الوطني</th>
                                                            <td>{{ $employees->natual_number }}</td>
                                                        </tr>


                                                  
                                                        <tr>
                                                            <th scope="row">مكان الاقامة</th>
                                                            <td>{{ $employees->live_place }}</td>
                                                            <th scope="row">الدولة</th>
                                                            <td>{{ $employees->state }}</td>
                                                            <th scope="row"> العنوان </th>
                                                            <td>{{ $employees->address }}</td>
                                                            <th scope="row"> رقم الموبايل </th>
                                                            <td>{{ $employees->mobile_number }}</td>
                                                            <th scope="row"> رقم الهاتف </th>
                                                            <td>{{ $employees->phone_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">ملاحظات</th>
                                                            <td>{{ $employees->note }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5"><!-- التاب رقم 5 خاص بالتحصيل العلمي -->
                                            <div class="table-responsive mt-15">
                                                    <div class="card-body">
                                                 
                                                            
                                            <button type="button" class="button x-small"  data-toggle="modal"
                                            data-target="#exampleModal">
                                                   اضافة تحصيل علمي
                                             </button>
                                            </form>
                                                    </div>
                                               
                                                <br>

                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th>المؤسسة التعليمية </th>
                                                            <th>نوع الشهادة</th>
                                                            <th>الاختصاص</th>
                                                            <th>مكان الدراسة</th>
                                                            <th>الملاحظات</th>
                                                            <th>وقت الاضافة </th>
                                                            <th>المستخدم</th>
                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- قمنا هنا بعمل حلقة لانه يمكن ان تتغير حالة الفاتوة من غير مدفوعة الى مدفوعة -->
                                                        <?php $i = 0; ?>
                                                        @foreach ($details as $x)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $x->study_org  }}</td>
                                                                <td>{{ $x->type_of_certif  }}</td>
                                                                <td>{{ $x->study_type  }}</td>
                                                               
                                                                <td>{{ $x->study_place  }}</td>
                                                                <td>{{ $x->note }}</td>
                                                                <td>{{ $x->created_at }}</td>
                                                                <td>{{ $x->user }}</td>
                                                                <td colspan="2">

                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('edit_employee_details') }}/{{ $x->id }}"
                                                                            role="button"><i class="fas fa-edit"></i>&nbsp;
                                                                            تعديل</a>  
                                                                            

                                                                         <!-- هذا زر من اجل الحذف عملنا له مودل في الاسفل وسكربت للحذف -->
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-employees_id="{{ $x->id }}"
                                                                            
                                                                                data-target="#delete_employees_details">حذف</button>
                                                                        

                                                                    </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6"><!-- تاب رقم 6 خاص بالمرفقات -->
                                            <!--المرفقات-->
                                            <div class="card card-statistics">
                                            @can('اضافة مرفق')
                                                    <div class="card-body">
                                                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">اضافة مرفقات</h5>
                                                        
                                                        <form method="post" action="{{ url('/employee_attachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="natual_number"
                                                                    value="{{ $employees->natual_number }}">
                                                                <input type="hidden" id="employee_id" name="employee_id"
                                                                    value="{{ $employees->id }}">
                                                                <label class="custom-file-label" for="customFile">حدد
                                                                    المرفق</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">تاكيد</button>
                                                        </form>
                                                    </div>
                                                    @endcan
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">م</th>
                                                                <th scope="col">اسم الملف</th>
                                                                <th scope="col">قام بالاضافة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- قمنا باضافة لووب لانه يمكن ان يضاف اكثر من مرفق واحد -->
                                                            <?php $i = 0; ?>
                                                            @foreach ($attachments as $attachment)
                                                                <?php $i++; ?>
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->Created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td colspan="2">
                                                                        <!-- هذا الزر من أجل عرض الملف المرفق سيذهب الى عنوان فيو فايل ويجلب معه رقم الفاتورة واسم الملف  -->
                                                                        <!-- الان سنذهب أولا الى الويب لعمل راوت ثم الى الكنترولر -->

                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('View_file') }}/{{ $attachment->natual_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                            عرض</a>
                                                                         <!-- هذا الزر من أجل تحميل الملف المرفق سيذهب الى عنوان داونلوود ويجلب معه رقم الفاتورة واسم الملف  -->
                                                                          <!-- الان سنذهب أولا الى الويب لعمل راوت ثم الى الكنترولر -->

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            href="{{ url('download') }}/{{ $attachment->natual_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i
                                                                                class="fas fa-download"></i>&nbsp;
                                                                            تحميل</a>
                                                                            
                                                                            @can('حذف المرفق')
                                                                         <!-- هذا زر من اجل الحذف عملنا له مودل في الاسفل وسكربت للحذف -->
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-employee_number="{{ $attachment->natual_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">حذف</button>
                                                                                @endcan

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->

          <!-- add_modal_Study -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            اضافة تحصيل علمي
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ url('/employee_details') }}" method="POST">
                            @csrf

                            <input type="hidden" id="id_employee" name="id_employee"
                                 value="{{ $employees->id }}">
                             {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">المؤسسة التعليمية </label>
                                <input type="text" class="form-control" id="inputName" name="study_org"
                                    title="يرجي ادخال اسم المؤسسة التعليمية " required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">نوع الشهادة</label>
                                <input type="text" class="form-control" id="inputName" name="type_of_certif"
                                    title="يرجي ادخال نوع الشهادة " required>
                            </div>

                        


                        </div>

                        {{-- 2 --}}
                        <div class="row">

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
                        <div class="row">
                        <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div> <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">اغلاق</button>
                        <button type="submit"
                                class="btn btn-success">حفظ التغييرات</button>
                    </div>
                    </form>
          </div>
        </div>   
      </div>

      </div>
    <!-- delete for attatchment -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('employee_attachment_destroy') }}" method="post"> <!-- سيذهب الى الويب ليعمل راوت باسم ديليت فايل ثم الى الكنترولر -->

                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p class="text-center">
                        <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                        </p>

                        <input type="hidden" name="id_file" id="id_file" value="">
                        <input type="hidden" name="file_name" id="file_name" value="">
                        <input type="hidden" name="employee_number" id="employee_number" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    					<!-- حذف التحصيل العلمي -->
		<div class="modal fade" id="delete_employees_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف التحصيل العلمي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('employee_details_destroy') }}" method="post">
                        
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الحذف ؟
                    <input type="hidden" name="employees_id" id="employees_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var employee_number = button.data('employee_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #employee_number').val(employee_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

<script>
        $('#delete_employees_details').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var employees_id = button.data('employees_id')

            var modal = $(this)

            modal.find('.modal-body #employees_id').val(employees_id);

        })

    </script>

@endsection
