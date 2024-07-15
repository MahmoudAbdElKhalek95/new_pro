
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
          الصور 
          </h5>
    </div>

    <section class="cards-description">
        <form  enctype="multipart/form-data" method="post"  action="{{ route('galary.update' , $galary->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
         
            
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

                  
                      <i<img src= "{{  asset($galary->image) }}" alt ="image" width="150px" height="150px">  
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



