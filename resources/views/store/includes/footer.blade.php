<div class="row px-5 footer" style="background-color: #EAF6F7;">
    <div class="col-12 col-lg-6 mt-5">
        <img  src="{{ asset('store/assets/img/aram-logo.png') }}"  alt="logo">
            <p class="mb-4">
            شركة ارام المستقبل

           </p>
        <div>
            <a href="#"><img src="{{ asset('store/assets/img/facebook-logo.svg')}}" width="24" height="24" alt=""></a>
            <a href="#"><img src="{{  asset('store/assets/img/snapchat-logo.svg') }}" width="24" height="24" alt=""></a>
            <a href="#"><img src="{{ asset('store/assets/img/twitter-logo.svg')}}" width="24" height="24" alt=""></a>
            <a href="#"><img src="{{ asset('store/assets/img/insta-logo.svg')}}" width="24" height="24" alt=""></a>
        </div>

    </div>

    <div class="col-6 col-lg-3 d-flex justify-content-center" style="margin-top: 130px;">
        <ul class="no-bullets">
            <li style="color: #2DA7AD" class="fw-bold mb-3">الروابط الرئيسية</li>
            <li class="mb-2"><a href="{{ route('store') }}">الصفحة الرئيسية</a></li>
            <li class="mb-2"><a href="#">المشاريع</a></li>
            <li class="mb-2"><a href="{{ route('home.courses') }}">  الحقائب</a></li>
            <li class="mb-2"><a href="{{ route('home.training') }}">  الخدمات</a></li>
            <li class="mb-2"><a href="{{ route('home.news') }}">  الاخبار</a></li>
            <li class="mb-2">
                 <a class="nav-link" href="{{ route('home.about') }}">من نحن</a>
                </li>


        </ul>
    </div>

    <div class="col-6 col-lg-3 d-flex justify-content-center" style="margin-top: 130px;">
        <ul class="no-bullets">
            <li style="color: #2DA7AD" class="fw-bold mb-3">تواصل معنا</li>
            <li class="d-flex flex-column mb-2">
                <div class="mb-1">
                    <img src="{{ asset('store/assets/img/address.svg')}}" width="20" height="20" alt="">
                    <span>العنوان :</span>
                </div>
                <span class="fw-bold">القصيم بريدة </span>
            </li>
            <li class="d-flex flex-column mb-2">
                <div class="mb-1">
                    <img src="{{ asset('store/assets/img/phone.svg')}}" width="20" height="20" alt="">
                    <span>رقم الجوال :</span>
                </div>
                <span class="fw-bold">0554166006</span>
            </li>
            <li class="d-flex flex-column mb-2">
                <div class="mb-1">
                    <img src="{{ asset('store/assets/img/mail.svg')}}" width="20" height="20" alt="">
                    <span>البريد الإلكتروني : </span>
                </div>
                <span class="fw-bold">info@arameducation.com</span>
            </li>
        </ul>
    </div>

    <div class="col-12">
        <hr>
        <div class="d-flex justify-content-between">
            <div>
                <span>جميع الحقوق محفوظة لـ</span>
                <a href="#" class="fw-bold">شركة ارام المستقبل</a>
                <span>@2023</span>
            </div>
            <div>
                <span>تصميم وبرمجة شركة</span>
                <a href="https://justclick.net.sa/"> justclick </a>
            </div>
        </div>
    </div>
</div>
