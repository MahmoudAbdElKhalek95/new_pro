
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            الشركاء 
          </h5>
    </div>

    <section class="cards-description">
        <form  enctype="multipart/form-data" method="post"  action="{{ route('partiner.update' , $partiner->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>
                <div class="col-md-12">
                    <div class="input-text">
                    
                      <label>النوع  </label>
                      <select class="form-control"  name="type"  >
                          <option value=""> اختر </option>
                          <option value="sponsors" {{ $partiner->type  =='sponsors' ? 'selected' : ''  }} >الشركاء </option>
                          <option value="confirmation"  {{  $partiner->type =='confirmation' ? 'selected' : ''  }} > جهات الاعتماد  </option>

                      </select>

                    </div>
                       @error('type')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>

                

                  <div class="row">
                    <div class="d-lg-flex align-items-center ">
                        <div class=" w-100 pe-lg-3">
                            <div class="input-field w-100">
                                <label>صوره  </label>
                                <input type="file" name="image"  alt="صوره  ">
                            </div>
                            @error('image')
                            <div class="alert alert-danger" >
                                {{ $message }}
                            </div>
                            @enderror
                    </div>

                    @isset( $partiner->image )
                      <img src= "{{  asset($partiner->image) }}" alt ="image" width="150px" height="150px">  
                    @endisset
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



