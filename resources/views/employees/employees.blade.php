@extends('layouts.master')
@section('css')
<!-- نقوم بجلب الجدول جاهز من صفحة تابل-داتا مع نسخ السكربتات والسي اس اس  ثم نقوم بالتعديلات على الصفحة -->
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الموظفين</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@section('content')

@if (session()->has('delete_employee'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف الموظف بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
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

    @if (session()->has('Import'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم توريد الملف بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
<!-- row -->
<div class="row">
				<div class="col-xl-12">
                 <div class="card mg-b-20">
	              <div class="card-header pb-0">
                  @can('اضافة موظف')
				  <a href="employees/create" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; اضافة موظف</a>
                  @endcan

                  @can('تصدير EXCEL')
				  <a class="modal-effect btn btn-sm btn-primary" href="{{ url('export_employees') }}"
                            style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>
                  @endcan

                  <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary">توريد اكسل</button>
               
                </form>


	              	<div class="d-flex justify-content-between">
		          

		         </div>

	             </div>
	<div class="card-body">
		<div class="table-responsive">
		<table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
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
												<th class="border-bottom-0">العمليات والمعلومات</th>
											</tr>
                                        </thead>
                                         <tbody>
										 <?php $i = 0; ?>
                                          @foreach ($employees as $Employees)
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
												
										
												<td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button"> العمليات والمعلومات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                @can('تعديل بيانات موظف')
                                                        <a class="dropdown-item"
                                                            href=" {{ url('edit_employee') }}/{{ $Employees->id }}"><i class="text-success fas fa-edit">
                                                            </i>&nbsp;&nbsp;تعديل بيانات الموظف</a>
                                                @endcan

                                                @can('حذف موظف')
                                                        <a class="dropdown-item" href="#" data-employees_id="{{ $Employees->id }}"
                                                            data-toggle="modal" data-target="#delete_employees"><i
                                                                class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                            الموظف</a>
                                                @endcan

                                                @can('طباعة بيانات موظف')
                                                        <a class="dropdown-item" href="Print_employees/{{ $Employees->id }}"><i
                                                                class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة
                                                            بيانات الموظف
                                                        </a>
                                                @endcan
                                               
														<a class="dropdown-item" href="{{ url('EmployeesDetails') }}/{{ $Employees->id }}"><i
                                                                class="text-success fas fa-info"></i>&nbsp;&nbsp;معلومات الموظف
                                                            
                                                        </a>

                                                  
                                                </div>
                                            </div>

                                        </td>
																
											</tr>
											@endforeach
                              
                                          </tbody>
                                     </table>
								</div>
							</div>
						</div>
					</div>
				<!-- row closed -->
			</div>
					<!-- حذف الموظف -->
		<div class="modal fade" id="delete_employees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف الموظف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('employees.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
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
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

<script>
        $('#delete_employees').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var employees_id = button.data('employees_id')
            var modal = $(this)
            modal.find('.modal-body #employees_id').val(employees_id);
        })

    </script>

@endsection