
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            contact 
          </h5>
    </div>

    <section class="cards-description">
        <form  enctype="multipart/form-data" method="post"  action="{{ route('contact.update' , $contact->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>
                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">الاسم</div>
                      <input type="text" name="name" value="{{ $contact->name  }}" class="search form-control" placeholder="الاسم">
                    </div>
                       @error('name')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>
                </div>
                <hr>



                  
            <div class="row">
              <div class="d-lg-flex align-items-center  mb-2 ">
                  <div class="w-100 pe-lg-3">
                      <div class="input-field w-100">
                          <label> العنوان   </label>
                          <input type="text" name="title" value="{{ $contact->title ?? old('title') }}"  placeholder=" العنوان  ">
                      </div>
                      @error('title')
                      <div class="alert alert-danger" >
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
            </div>


              <div class="row">
                  <div class="d-lg-flex align-items-center  mb-2 ">
                      <div class="w-100 pe-lg-3">
                          <div class="input-field w-100">
                              <label> البريد الالكتروني    </label>
                              <input type="text" name="email" value="{{ $contact->email ??  old('email') }}"  placeholder=" البريد الالكتروني   ">
                          </div>
                          @error('email')
                          <div class="alert alert-danger" >
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
                </div>

                  <div class="row">
                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">الوصف</div>
                      <textarea type="text" name="description" class="search form-control" placeholder="الوصف">{{ $contact->description  }}</textarea>
                    </div>
                       @error('description')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>
                </div>

                  <div class="col-md-12">
                    <button  style="margin-bottom: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
                  </div>
              </div>
        </form>
    </section>



  </div>
</div>

@endsection



