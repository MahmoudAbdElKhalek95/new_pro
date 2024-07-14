
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            الاعدادات
          </h5>
    </div>

    <section class="cards-number">
        <form  method="post"  action="{{ route('setting.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="row">
                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label"> العنوان  </div>
                      <input type="text" name="adress" value="{{ $setting->adress  }}" class="search form-control" placeholder=" العنوان">
                    </div>
                       @error('adress')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>
                </div>
              <hr>
              <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">رقم  التواصل </div>
                      <input type="text" name="contact_number" value="{{ $setting->contact_number  }}" class="search form-control" placeholder="رقم  التواصل">
                     </div>
                       @error('contact_number')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>
                </div>

                <hr>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">  رابط الموقع </div>
                      <input type="text" name="gppgle_map_link" value="{{ $setting->gppgle_map_link  }}" class="search form-control" placeholder="رابط الموقع ">
                    </div>
                       @error('gppgle_map_link')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>
                </div>

                <hr>
                <hr>


                  <div class="col-md-12">
                    <button  style="margin-bottom: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
                  </div>
              </div>
        </form>
    </section>

  </div>
</div>

@endsection



