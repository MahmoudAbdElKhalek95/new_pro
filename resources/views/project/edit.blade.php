
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            المشاريع
          </h5>
    </div>

    <section class="cards-description">
        <form  enctype="multipart/form-data" method="post"  action="{{ route('updateProject' , $project->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>
                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">إسم المشروع</div>
                      <input type="text" name="name" value="{{ $project->name  }}" class="search form-control" placeholder="إسم المشروع">
                    </div>
                       @error('name')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">وصف المشروع</div>
                      <textarea type="text" name="description" class="search form-control" placeholder="وصف المشروع">{{ $project->description  }}</textarea>
                    </div>
                       @error('description')
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

                    @isset( $project->image )
                      <i<img src= "{{  asset($project->image) }}" alt ="image" width="150px" height="150px">  
                    @endisset
                </div>

                  {{--  <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label"> الفئة العمريه </div>
                      <select  class="form-select"  name ="age[]" multiple >

                        <option disabled  hidden >ابحث ب الفئة العمريه من هنا</option>
                        <option value="الإبتدائي"  {{   in_array( 'الإبتدائي'  ,  explode(',' , $project->age )  ) ? 'selected' : ''    }}>الإبتدائي</option>
                        <option value="المتوسط" {{   in_array( 'المتوسط'  ,  explode(',' , $project->age )  ) ? 'selected' : ''    }} >المتوسط</option>
                        <option value="الثانوي" {{   in_array( 'الثانوي'  ,  explode(',' , $project->age )  ) ? 'selected' : ''    }} >الثانوي</option>
                        <option value="الجامعي" {{   in_array( 'الجامعي'  ,  explode(',' , $project->age )  ) ? 'selected' : ''    }} >الجامعي</option>
                        <option value="أخرى" {{   in_array( 'أخرى'  ,  explode(',' , $project->age )  ) ? 'selected' : ''    }} >أخرى</option>

                      </select>
                    </div>
                    @error('age')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>  --}}


                  <div class="col-md-12">
                    <button  style="margin-bottom: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
                  </div>
              </div>
        </form>
    </section>



  </div>
</div>

@endsection



