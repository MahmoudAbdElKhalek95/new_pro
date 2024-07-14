
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            المدن السعودية
          </h5>
    </div>

    <section class="cards-number" style="min-height: 450px;">
        <form  method="post"  action="{{ route('addStateFromExcel') }}"    enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>

                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">المدن السعودية</div>
                      <input type="file" name="excel"   class="search form-control" >
                    </div>
                       @error('excel')
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



