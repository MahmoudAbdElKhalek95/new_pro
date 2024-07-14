@extends('dashboard.layouts.mainapp')
@section('title', 'الصلاحيات')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="row">
        <div class="col-lg-12">
            <div class="card"  id="GovsList">

                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">إنشاء دور جديد</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" required placeholder="الاسم">
                                        <label for="name">الاسم</label>
                                    </div>
                                    @error('name')
                                    <div class="invalid-feedback" style="display:block;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-floating">
                                        <select   class="form-control" name="access" required placeholder="امكانية الوصول">
                                        <option value="0">امكانية الوصول  </option>

                                        <option value="1">  استعراض الباينات بالكامل  </option>

                                        <option value="2">استعراض الباينات للجهة فقط   </option>

                                        <option value="3">  استعراض الباينات الشخصية فقط  </option>

                                        </select>

                                    </div>
                                    @error('name')
                                    <div class="invalid-feedback" style="display:block;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">الصلاحيات: </h5>
                                    </div>
                                    <br>
                                    <div class = "row">
                                    @foreach($permission as $value)
                                        <div class = "col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name = "permission[]" value = "{{$value->id}}" id = "{{$value->id}}">
                                                <label class="form-check-label" for="{{$value->id}}">
                                                    {{$value->ar_name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-between">
                                        <button type="submit" class="btn btn-primary">إنشاء</button>
                                        <a class="btn btn-primary" href="{{ url()->previous() }}">عودة</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
