
@extends('dashboard.layouts.mainapp')
@section('title', 'أنواع الاستبانات')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            أنواع الاستبانات
          </h5>
    </div>

    <section class="cards-number" style="min-height: 700px;">
        <form  method="post"  action="{{ route('question_types.update' , $type->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>

                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	نوع الاستبانة</div>
                      <input type="text" name="name" value="{{ $type->name }}" class="search form-control" placeholder="	نوع الاستبانة">
                    </div>

                       @error('name')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>


              <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> عرض  الاستبانة     </div>
                  <select  name="type"  class="form-select"  id ="type">
                    <option  value="null" >   اختر </option>
                    <option   value="company"   {{  $type->type == 'company' ? 'selected' : ''  }}>    جهة  </option>
                    <option value="trainer" {{  $type->type == 'trainer' ? 'selected' : ''  }}>     مدرب </option>
                    <option value="student" {{  $type->type == 'student' ? 'selected' : ''  }}>     متدرب </option>
                    <option value="manager"  {{  $type->type == 'manager' ? 'selected' : ''  }}>    مدير مشروع </option>

                  </select>
                </div>
                @error('type')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror

              </div>





                <button style="margin-top: 15px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
        </form>
    </section>



  </div>
</div>

@endsection



