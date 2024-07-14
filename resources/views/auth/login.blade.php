<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="{{  asset('frontend/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{  asset('frontend/css/normalize.css')}}">
    <link rel="stylesheet" href="{{  asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{  asset('frontend/css/mainStyle.css')}}">

</head>
<body>
    @include('includes.messages')

<div class="login-page">
    <div class="form-login">

        <div class="logo">
            <img src="{{ asset('frontend/image/logo/logo.png') }}">
        </div>
        <div class="form">
            <h4>تسجيل الدخول</h4>
            <small>مرحبا بكم معنا في ارام المستقبل</small>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-text">
                    <div class="label">البريد الالكترونى أو رقم الموبايل</div>
                    <input type="email" name="email" class="search password form-control"
                           placeholder="البريد الالكترونى أو  رقم الموبايل" style="direction: rtl">

                           @error('email')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                         @enderror
                </div>
                <div class="input-text">
                    <div class="label">اكتب كلمة السر</div>
                    <input type="password" name ="password"  class="search password form-control" placeholder="اكتب كلمة السر">
                    <span class="input-group-text togglePassword">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </span>
                    @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                </div>
                <button type="submit" class="form-control">دخول</button>
            </form>
            <div class="forget-remember">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name ="rememberme" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        تذكرنى عند الدخول
                    </label>
                </div>
                @if (Route::has('password.request'))
                <div class="forget">
                    <span>هل نسيت كلمة السر ؟ <a href="{{ route('password.request') }}">اضغط هنا</a></span>
                </div>
                @endif
            </div>
            <div class="create-account">
                <span>ليس لديك حساب ؟ <a href="{{ route('register') }}">سجل الآن</a></span>
            </div>
            <div class="copyRight">
                <small> @جميع الحقوق محفوظة للبرنامج ارام المستقبل</small>
            </div>
        </div>
    </div>
    <div class="image">
        <img src="{{ asset('frontend/image/Repeat%20Grid%201.png')}}">
    </div>

</div>
</body>

<script src="{{ asset('frontend/js/pagination.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/mainScript.js')}}"></script>
</html>
