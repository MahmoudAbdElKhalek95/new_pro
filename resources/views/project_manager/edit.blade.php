
@extends('dashboard.layouts.mainapp')
@section('title', 'مدراء المشاريع')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            مدراء المشاريع
          </h5>
    </div>

    <section class="cards-number">
        <form  method="post"  enctype="multipart/form-data" action="{{ route('project_managers.update' , $project_manager->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>


                <div class="row">
                    <span class="mb-3" style="display: inline-block">معومات عامة</span>

                    <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">	الاسم</div>
                          <input type="text" name="name" value="{{  $project_manager->name }}" class="search form-control" placeholder="	الاسم">
                        </div>
                           @error('name')
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

                            <option value="{{ $item->id }}" {{ $project_manager->city_id == $item->id ? 'selected' : ''    }}> {{  $item->name  }} </option>

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
                        <div class="selected-option">
                        <div class="label">المدينة   </div>
                        <select  class="form-select"  name ="state_id">
                            <option disabled  hidden >  المدينة   </option>
                           @foreach ( $states  as  $item  )

                            <option value="{{ $item->id }}" {{ $project_manager->state_id  == $item->id  ? 'selected' : '' }} > {{  $item->name  }} </option>

                           @endforeach

                          </select>
                      </div>
                       @error('state_id')
                       <div class="alert alert-danger" >
                       {{ $message }}
                      </div>
                      @enderror
                    </div>


                    <div class="col-md-12">
                      <div class="input-text">
                        <div class="label">البــريد الإلكتروني</div>
                        <input type="email"  name="email" value="{{ $project_manager->email  }}" class="search form-control" placeholder="البــريد الإلكتروني">
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
                        <input type="text" name="phone" value="{{ $project_manager->phone  }}" class="search form-control" placeholder="الجـوال">
                      </div>
                      @error('phone')
                      <div class="alert alert-danger" >
                       {{ $message }}
                      </div>
                      @enderror
                    </div>

                      <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">تاريخ الميلاد</div>
                          <input type="date" name="birth_date" value="{{  $project_manager->birth_date }}" class="search form-control" placeholder="تاريخ الميلاد">
                        </div>
                        @error('birth_date')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">الموهل الدراسي </div>
                          <input type="text" name="qualifacation" value="{{ $project_manager->qualifacation  }}" class="search form-control" placeholder="الموهل الدراسي ">
                        </div>
                        @error('qualifacation')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">التخصص  </div>
                          <input type="text" name="specialization" value="{{ $project_manager->specialization  }}" class="search form-control" placeholder="التخصص  ">
                        </div>
                        @error('specialization')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">العمل الحالي  </div>
                          <input type="text" name="current_work" value="{{ $project_manager->current_work  }}" class="search form-control" placeholder="العمل الحالي  ">
                        </div>
                        @error('current_work')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                      </div>


                      <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">الصورة الشخصية</div>
                          <input type="file" name="image"  class="search form-control" placeholder="الصورة الشخصية">
                        </div>
                        <img src="{{ asset( $project_manager->image ) }}" alt="image" width="100px" height="100px">
                        @error('image')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">شهادة  </div>
                          <input type="file" name="cert"  class="search form-control" placeholder="الصورة الشخصية">
                        </div>
                        <img src="{{ asset( $project_manager->cert ) }}" alt="cert" width="100px" height="100px">
                        @error('cert')
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


                <button   type="submit" class="btn btn-success save-btn form-control" style="margin-bottom: 25px;"> حفظ  </button>
              </div>
        </form>
    </section>



  </div>
</div>

@endsection



