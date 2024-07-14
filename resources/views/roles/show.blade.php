@extends('dashboard.layouts.mainapp')
@section('title', 'الصلاحيات')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">

<div class="row">
    <div class="col-lg-12">
        <div class="card"  id="RoleList">

            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">{{ $role->name }} Role</h5>
                </div>
            </div>

            <div class="card-body">
                <div class="live-preview">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1">Permissions: </h5>
                                </div>
                                <div class = "row">

                                @foreach($rolePermissions as $value)
                                    <div class = "col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" checked disabled>
                                            <label class="form-check-label">
                                                {{$value->ar_name}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-start">
                                    <a class="btn btn-primary" href="{{ url()->previous() }}">Return</a>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </div><!--end col-->
</div><!--end row-->
</section>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
<script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ticketlist.init.js') }}"></script>
@endsection

