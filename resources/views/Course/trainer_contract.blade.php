
@extends('dashboard.layouts.mainapp')
@section('title', '  نموذج عقد المدرب')

@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>

              نموذج عقد المدرب - {{  $courses->name }}

          </h5>
    </div>

    <section class="table-responsive-xl" style="">
        <form  method="post"  action="{{ route('trainer.contract' , $courses->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	عدد الساعات</div>
                      <input type="text" name="hour_number" value="{{ $courses->hour_number  }}" class="search form-control" placeholder="	عدد الساعات">
                    </div>
                       @error('hour_number')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                    </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label"> المبلغ </div>
                  <input type="text" name="price" value="{{ old('price')}}" class="search form-control" placeholder=" المبلغ ">
                </div>
                   @error('price')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">   المده </div>
                  <input type="text" name="duration" value="{{ $courses->duration }}" class="search form-control" placeholder=" المده">
                </div>
                   @error('duration')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
                </div>




                <button  type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
        </form>
    </section>



  </div>
</div>

@endsection



