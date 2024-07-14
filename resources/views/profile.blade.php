
@extends('dashboard.layouts.mainapp')
@section('title', ' تعديل بياناتي')
@section('content')



<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            تعديل بياناتي

         </h5>
    </div>

    <section class="table-responsive-xl">

        <form  method="post" enctype="multipart/form-data" action="{{ route('updateProfile') }}">
            @csrf

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="modal-body">
             <div class="row">
               <span class="mb-3" style="display: inline-block">معومات عامة</span>



                 <div class="col-md-12">
                   <div class="input-text">
                     <div class="label"> الاسم</div>
                     <input type="text"  name="name" value="{{ auth()->user()->name ?? old('name') }}" class="search form-control" placeholder="الاسم">
                   </div>
                   @error('name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
                 </div>





               <div class="col-md-12">
                 <div class="input-text">
                   <div class="label">البــريد الإلكتروني</div>
                   <input type="email"  name="email" value="{{  auth()->user()->email ??  old('email') }}" class="search form-control" placeholder="البــريد الإلكتروني">
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
                   <input type="text" name="phone" value="{{ auth()->user()->phone ??  old('phone') }}" class="search form-control" placeholder="الجـوال">
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
               {{-- <div class="col-md-12">
               <div class="form-check mx-3">
                   <input class="form-check-input" name="status" value="{{ old('status') }}" type="checkbox" value="" id="flexCheckDefault8">
                   <label class="form-check-label" for="flexCheckDefault8">
                     تفعيل الحساب
                   </label>
                 </div>
               </div> --}}
               <div class="col-md-12">

               <button  style="margin-bottom: 25px;" type="submit" class="btn btn-success form-control"> حفظ  </button>
               </div>
             </div>
           </div>
           </form>


    </section>



  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).ready(function(){


      $("#type").change(function(){
            $("#question_card").show();
            $(".question_row_all").hide();
            $(".question_row_"+$(this).val()).show();
       });
   });

   </script>
@endsection
