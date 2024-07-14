
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

    <section class="cards-number">
        <form  method="post"  action="{{ route('updateProject' , $project->id) }}">
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
                      <div class="label">رقم المشروع</div>
                      <input type="text" name="number" value="{{ $project->number  }}" class="search form-control" placeholder="رقم المشروع">
                    </div>
                       @error('number')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">الدعم المشروع</div>
                      <input type="text" name="support_company" value="{{ $project->support_company  }}" class="search form-control" placeholder="الدعم ">
                    </div>
                       @error('support_company')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">مدير المشروع</div>
                      <input type="text" name="project_manager" value="{{ $project->project_manager }}" class="search form-control" placeholder="مدير المشروع ">
                    </div>
                       @error('project_manager')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">تاريخ البدايه</div>
                      <input type="date" name="start_date" value="{{ $project->start_date }}" class="search form-control" placeholder="مدير المشروع ">
                    </div>
                       @error('start_date')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                    </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">تاريخ النهايه</div>
                      <input type="date" name="end_date" value="{{ $project->end_date }}" class="search form-control" placeholder="مدير المشروع ">
                    </div>
                       @error('end_date')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">الموقع</div>
                      <input type="text" name="location" value="{{ $project->location }}" class="search form-control" placeholder="الموقع ">
                    </div>
                       @error('location')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>



                

               

           


                  <div class="col-md-12">
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



