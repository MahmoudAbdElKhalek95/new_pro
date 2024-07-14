
@extends('dashboard.layouts.mainapp')
@section('title', '     نوذج طلب دوره ندربية  ')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            نوذج طلب دوره ندربية
          </h5>
    </div>

    <section class="cards-number" style="min-height:2000px;">
        <form  method="post"  enctype="multipart/form-data"  action="{{ route('addTrainingRequest' , $type ) }}">
           @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	السعر </div>
                      <input type="text" name="price" value="" class="search form-control " placeholder="	السعر ">
                    </div>
                       @error('price')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	ايصال السداد </div>
                      <input type="file" name="file" value="" class="search form-control " placeholder="	ايصال السداد ">
                    </div>
                       @error('file')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>



                <button  style="margin-top: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
        </form>
    </section>



  </div>
</div>

@endsection



