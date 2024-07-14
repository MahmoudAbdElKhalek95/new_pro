<section class="adv-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="main-title">
                    <h2 class="title wow fadeInDown">
                        {{ trans('home.SPONSERED BY') }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 adv-img">
                <img class="img-fluid" src="{{ asset('frontend/assets/imgs/main/sponsers.png')}}" alt="advertisers sponsers">
            </div>
        </div>
    </div>
</section>
</main>

<footer class="footer ">
    <div class="container">
        <div class="row">

            <div class="col-6 col-md-6 col-lg-4">
                <h4 class="footer-title h5">
                    <img src="{{$setting->footer_logo }}" style="width:100%; height:auto;" alt="">
                </h4>
                <ul class="footer-content svg-icons">
                    <li>
                        {!!$setting->footer_desc !!}
                        
                    </li>
                </ul>
            </div>

            <div class="col-6 col-md-6 col-lg-4">
                <h4 class="footer-title h5">
                    {{ trans('home.contact') }}
                </h4>
                <ul class="footer-content svg-icons">
                    <li>
                        <img src="{{ asset('frontend/assets/imgs/icons/whatsapp.svg')}}" alt="">
                        <span>
                            {{$setting->whatsapp }}
                        </span>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/imgs/icons/telephone.svg')}}" alt="">
                        <span>  {{$setting->phone }} </span>
                    </li>
                    <li>
                        <img src="{{ asset('frontend/assets/imgs/icons/mail.svg')}}" alt="">
                        <span>
                            <a href="mailto:info@wrosaudi.com ">
                                {{$setting->email }}
                            </a> </span>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/imgs/icons/internet.svg')}}" alt="">
                            <span> <a href=" {{$setting->domain }}">
                                {{$setting->domain }}
                            </a>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-6 col-lg-4">
                    <h4 class="footer-title h5">
                        {{ trans('home.competitions') }}
                    </h4>
                    <ul class="footer-content svg-icons">
                        @foreach (GetCompetition() as $competition)
                            <li>
                                <img src="{{ asset('frontend/assets/imgs/icons/award.svg')}}" alt="award">
                                <span> <a href="{{ hurl('/competitions/'.$competition->id) }}"> {{ $competition->lang_name }} </a></span>
                            </li>
                        @endforeach

                    </ul>
                </div>


        </div>
</div>
        <div class="footer-base">
            <div class="container">
                <div class="row">
                     <div class="col-12 content">
                        <span class="copy">{{$setting->copyrights }}   </span>
                    </div>
                </div>
            </div>
        </div>

    </footer>
