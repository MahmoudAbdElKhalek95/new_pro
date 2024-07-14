
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">


        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            إدارة  حسـابات المشرفين
          </h5>
    </div>

    <section class="cards-number">
        <form  method="post"  action="{{ route('updateManager' , $users->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
            <div class="row">
              <span class="mb-3" style="display: inline-block">معومات عامة</span>
              <div class="col-md-12">
                  <div class="input-text">
                    <div class="label">الإسم</div>
                    <input type="text" name="name" value="{{ $users->name   }}" class="search form-control" placeholder="الإسم">
                  </div>
                     @error('name')
                     <div class="alert alert-danger" >
                      {{ $message }}
                     </div>
                     @enderror
                </div>
                <div class="col-md-12">
                  <div class="selected-option">
                    <div class="label"> النوع </div>
                    <select  class="form-select"  name ="role_id">
                      <option disabled  hidden >ابحث ب النوع من هنا</option>
                      <option value="1"  {{  $users->role_id == 1 ? 'selected' : ''  }}> مشرف رئيسي</option>
                      <option value="2"  {{  $users->role_id == 2 ? 'selected' : ''  }}> مشرف فرعي</option>
                    </select>
                  </div>
                  @error('role_id')
                  <div class="alert alert-danger" >
                   {{ $message }}
                  </div>
                  @enderror
                </div>

                @if( $users->role_id == 2  )
                <div class="col-md-12">
                  <div class="selected-option">
                  <div class="label">المنطقه  </div>
                  <select  class="form-select"  name ="city_id">
                      <option disabled  hidden >  المنطقه  </option>
                     @foreach ( $cities  as  $item )

                      <option value="{{ $item->id }}" > {{  $item->name  }} </option>

                     @endforeach

                    </select>
                </div>
                 @error('city_id')
                 <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>
              @endif

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">البــريد الإلكتروني</div>
                  <input type="email"  name="email" value="{{ $users->email }}" class="search form-control" placeholder="البــريد الإلكتروني">
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
                  <input type="text"   value="{{ $users->phone }}" name="phone" class="search form-control" placeholder="الجـوال">
                </div>
                @error('phone')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> الموهل * </div>
                  <select  class="form-select"  name ="qualification" id ="qualifacation">
                    <option disabled selected hidden >ابحث ب الموهل من هنا</option>
                    <option value="الإبتدائي" {{ $users->qualification == 'الإبتدائي'  ? 'selected' :  ''}} >الإبتدائي</option>
                    <option value="المتوسط" {{ $users->qualification == 'المتوسط'  ? 'selected' :  ' '}} > >المتوسط</option>
                    <option value="الثانوي" {{ $users->qualification == 'الثانوي'  ? 'selected' :  ' '}} >الثانوي</option>
                    <option value="الجامعي" {{ $users->qualification == 'الجامعي'  ? 'selected' :  ' '}} >الجامعي</option>
                    <option value="ماجستير" {{ $users->qualification == 'ماجستير'  ? 'selected' :  ' '}} >ماجستير</option>
                    <option value="دكتوراه" {{ $users->qualification == 'دكتوراه'  ? 'selected' :  ' '}} >دكتوراه</option>
                    <option value="أخرى" {{ $users->qualification == 'أخرى'  ? 'selected' :  ' '}} >أخرى</option>
                  </select>
                </div>
                @error('qualification')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text" id = "specialization">
                  <div class="label">التخصص  </div>
                  <input type="text" name="specialization"  value="{{  $users->specialization  }}" class="search form-control" placeholder="التخصص  ">
                </div>
                @error('specialization')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label"> الصوره   </div>
                  <input type="file" name="image"  class="search form-control" ">
                </div>


                @if ( !empty( $users->image )  )

                <img src="{{ asset($users->image) }}" alt="image" width="100px" height="100px">

                @endif

                @error('image')
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

              <button  type="submit" class="btn btn-sucess" style="background-color: #147058; margin-bottom: 25px;"> حفظ  </button>
             </div>
            </div>
          </form>
    </section>



  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).ready(function(){
         console.log('asadaddad', '')


      $("#qualifacation").change(function(){


       // alert("Asd" + $(this).val() )
            var value = $(this).val();

            if( value == "الإبتدائي"  ||  value == "المتوسط" || value == "الثانوي"   )
            {

                $("#specialization").hide();


            }else{

                $("#specialization").show();

            }


       });
   });


   //////////////////////////////////////////////





   ///////////////////////////////////////////////

   </script>


@endsection



