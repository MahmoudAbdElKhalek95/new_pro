
@extends('dashboard.layouts.mainapp')
@section('title', 'السليدر')
@section('content')



     <!-- Start page content -->
<section class="supervisors-accounts">
     <div class="container-fluid">
        <form  method="post"  enctype="multipart/form-data"  action="{{ route('sliders.update' , $slider->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <span class="mb-3" style="display: inline-block">السليدر</span>


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الاسم</div>
                      <input type="text" name="title" value="{{ $slider->title }}" class="search form-control " placeholder="	الاسم">
                    </div>
                       @error('title')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>

    
                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الوصف </div>
                      <textarea   name="description"  class="search form-control" placeholder="	الوصف ">{{  $slider->description }}</textarea>
                    </div>
                       @error('description')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الصورة</div>
                      <input type="file" name="image" value="{{ $slider->image }}" class="search form-control " placeholder="	الصورة">
                    </div>
                       @error('image')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                       <img src="{{ $slider->image }}" width="200px" height="200px">

                  </div>


                 

                <button  style="margin-top: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
          </form>
      </div>
    </section>



@endsection



