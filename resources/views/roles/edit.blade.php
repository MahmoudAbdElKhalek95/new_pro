@extends('dashboard.layouts.mainapp')
@section('title', 'الصلاحيات')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">

    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!} --}}

<div class="row">
    <div class="col-lg-12">
        <div class="card"  id="RolesList">

            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">تعديل الأدوار</h5>
                </div>
            </div>

            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('roles.update',$role->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-lg-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" required value = "{{ $role->name }}">
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

                                    <option value="1" {{ $role->access == 1 ? 'selected' : ''   }}>  استعراض الباينات بالكامل  </option>

                                    <option value="2"  {{ $role->access == 2 ? 'selected' : ''   }}>   استعراض الباينات للجهة فقط   </option>

                                    <option value="3"  {{ $role->access == 3 ? 'selected' : ''   }}>   استعراض الباينات الشخصية فقط  </option>

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
                                <div class = "row">
                                @foreach($permission as $value)
                                    <div class = "col-sm-3">
                                        <div class="form-check">
                                            @if(in_array($value->id, $rolePermissions))
                                                <input class="form-check-input" type="checkbox" name = "permission[]" value = "{{$value->id}}" checked id = "{{$value->id}}">
                                            @else
                                                <input class="form-check-input" type="checkbox" name = "permission[]" value = "{{$value->id}}" id = "{{$value->id}}">
                                            @endif
                                            <label class="form-check-label" for="{{$value->id}}">
                                                {{-- {{ __('permissions.'.$value->name) }} --}}
                                                {{ $value->ar_name ?? '' }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-primary" href="{{ url()->previous() }}">Return</a>
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

