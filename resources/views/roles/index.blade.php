@extends('dashboard.layouts.mainapp')
@section('title', 'الصلاحيات')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">ادارة الصلاحيات</h5>
                        <div class="flex-shrink-0">
                            <a class="btn btn-primary" href="{{ route('roles.create') }}"><i class="ri-add-line align-bottom me-1"></i> انشاء دور جديد</a>
                        </div>
                    </div>
                </div>

                <!-- List All Governorates -->
                <div class="card-body" id = "rolesList">
                    <div>
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap" id="govsTable">
                                @if( $roles == '' )
                                    <div class="noresult">
                                        <div class="text-center"><lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                       colors="primary:#25a0e2,secondary:#00bd9d" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0"> We did not find any City for you search.</p>
                                        </div>
                                    </div>
                                @else
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th class="sort" data-sort="id">الرقم</th>
                                        <th class="sort" data-sort="name">اسم الصلاحية</th>
                                        <th class="sort" data-sort="action" colspan = "3" style = "text-align:center;">الاجراءات </th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($roles as $i => $role)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </th>
                                        <td class="id"><a href="{{ route('roles.show',$role->id) }}" class="fw-medium link-primary">{{ $i +=1; }}</a></td>
                                        <td class="name">{{ $role->name }}</td>
                                        <td style = "text-align:center;">
                                            <form action="{{ route('roles.destroy',$role->id) }}" method="Post">
                                                <a class="btn btn-warning" href="{{ route('roles.show',$role->id) }}">عرض</a>
                                                <a class="btn btn-info" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                                                {{-- @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger" id="sa-success" onclick="return confirm('Are you sure to delete?')"  >حذف</button> --}}
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-next" href="#">
                                    القادم
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-prev disabled" href="#">
                                    السابق
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--end col-->
    </div>
</section>
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

