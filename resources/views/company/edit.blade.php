
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">


        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            الجهات التنفيذية
          </h5>
    </div>

    <section class="cards-number">
        <form  method="post"  action="{{ route('updateCompany' , $users->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
              <span class="mb-3" style="display: inline-block">معومات عامة</span>
              <div class="col-md-12">
                  <div class="input-text">
                    <div class="label">اسم الجهة</div>
                    <input type="text" name="company_name" value="{{ $users->user->name ?? ''  }}" class="search form-control" placeholder="اسم الجهة">
                  </div>
                     @error('company_name')
                     <div class="alert alert-danger" >
                      {{ $message }}
                     </div>
                     @enderror
                </div>

                <div class="col-md-12">
                  <div class="input-text">
                    <div class="label">الجهة التابعه لها</div>
                    <input type="text"  name="regulator" value="{{ $users->regulator ?? '' }}" class="search form-control" placeholder="الجهة التابعه لها">
                  </div>
                  @error('regulator')
                  <div class="alert alert-danger" >
                   {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <div class="input-text">
                    <div class="label">المدير التنفيذي</div>
                    <input type="text"  name="name" value="{{  $users->name ?? ' ' }}" class="search form-control" placeholder="المدير التنفيذي">
                  </div>
                  @error('name')
                  <div class="alert alert-danger" >
                   {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <div class="input-text">
                    <div class="label">رقم التصريح</div>
                    <input type="text"  name="clearance_no" value="{{  $users->clearance_no ?? ' '  }}" class="search form-control" placeholder="رقم التصريح">
                  </div>
                  @error('clearance_no')
                  <div class="alert alert-danger" >
                   {{ $message }}
                  </div>
                  @enderror
                </div>



                <div class="col-md-12">
                  <div class="selected-option">
                  <div class="label">المنطقه  </div>
                  <select  class="form-select"  name ="city_id">
                      <option disabled  hidden >  المنطقه  </option>
                     @foreach ( $cities  as  $item )

                      <option value="{{ $item->id }}" {{  $users->city_id == $item->id ? 'selected' : ''  }} > {{  $item->name  }} </option>

                     @endforeach

                    </select>
                </div>
                 @error('city_id')
                 <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">البــريد الإلكتروني</div>
                  <input type="email"  name="email" value="{{ $users->user->email  }}" class="search form-control" placeholder="البــريد الإلكتروني">
                </div>
                @error('email')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الجـوال</div>
                  <input type="text" name="phone" value="{{   $users->user->phone  }}" class="search form-control" placeholder="الجـوال">
                </div>
                @error('phone')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <hr>
              <span class="mb-3"  style="display: inline-block">تعيين كلمة المرور</span>
              <div class="col-md-12">
                <div class="input-text">
                  <div class="label" >اكتب كلمة السر</div>
                  <input type="password" name="password" class="search password form-control" placeholder="اكتب كلمة السر">
                  <span class="input-group-text togglePassword" >
                   <i class="fa fa-eye-slash" aria-hidden="true"></i>
                  </span>
                </div>
                @error('password')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-md-12">
                <div class="input-text">
                  <div class="label" >اعد كتابة كلمة السر</div>
                  <input type="password" name="password_confirmation"  class="search password form-control" placeholder="اعد كتابة كلمة السر">
                  <span class="input-group-text togglePassword" >
                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                  </span>
                </div>
                @error('password_confirmation')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-md-12">
              <div class="form-check mx-3">
                  <input class="form-check-input" name="status"  {{ $users->user->isActive == 1 ? 'checked' : ''  }}  type="checkbox" id="flexCheckDefault8">
                  <label class="form-check-label" for="flexCheckDefault8">
                    تفعيل الحساب
                  </label>
                </div>
              </div>

              <div class="col-md-12">
              <button   type="submit" class="btn save-btn form-control" style="background-color: #147058; margin-bottom: 25px; "> حفظ  </button>
              </div>
            </div>
        </form>
    </section>



  </div>
</div>

@endsection



