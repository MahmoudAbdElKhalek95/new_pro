
@extends('dashboard.layouts.mainapp')
@section('title', 'انواع الخدمات')
@section('content')



     <!-- Start page content -->
<section class="supervisors-accounts">
     <div class="container-fluid">
        <form  method="post"  enctype="multipart/form-data"  action="{{ route('training_types.update' , $training_types->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <span class="mb-3" style="display: inline-block">انواع الخدمات</span>


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	انواع الخدمات</div>
                      <input type="text" name="name" value="{{ $training_types->name }}" class="search form-control " placeholder="	انواع الخدمات">
                    </div>
                       @error('name')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>






                <button  style="margin-top: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
          </form>
      </div>
    </section>



@endsection



