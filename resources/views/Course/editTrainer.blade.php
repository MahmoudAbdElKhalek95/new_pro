
@extends('dashboard.layouts.mainapp')
<title> الحقائب التدريبية</title>

@section('content')
<div class="home-page implementingAgencies">
<div class="container" >
    <div class="header-title-page" style="margin-top: 150px;">

        <h5 class="mb-4 mt-75" style="margin-top: 50px;">
            <i class="fa fa-university" aria-hidden="true"></i>
            الحقائب التدريبية
          </h5>
    </div>

    <section class="cards-number">
        <form  method="post"   enctype="multipart/form-data" action="{{ route('addCourseToCompany' , $courses->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>
                <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label"> المدرب</div>
                      <select  name="trainer_id"  class="form-select" >
                        <option disabled  hidden >ابحث ب المدرب من هنا</option>
                        @foreach ( $trainers as  $item)
                        <option value="{{  $item->id ?? '' }}">  {{  $item->name }}</option>
                        @endforeach

                      </select>
                    </div>
                    @error('trainer_id')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">عدد المقاعد</div>
                      <input type="number"  name="seats" class="search form-control" placeholder="عدد المقاعد">

                    </div>

                    @error('seats')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">السعــر</div>
                      <input type="number"  name="cost" class="search form-control" placeholder="السعــر">
                    </div>
                      @error('cost')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">تبدأ</div>
                      <input type="date"  name="start" class="search form-control" placeholder="تبدأ">
                    </div>
                      @error('start')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">تنتهي</div>
                      <input type="date"  name="end" class="search form-control" placeholder="تنتهي">
                    </div>
                      @error('end')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>





                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">الصورة </div>
                      <input type="file" name="image"  class="search form-control" placeholder="الصورة ">
                    </div>
                  </div>
                    @error('image')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div> --}}




                <button  type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
        </form>
    </section>



  </div>
</div>

@endsection



