
{{-- @extends('store.layouts.mainapp') --}}

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('store.includes.head')

<body>

    <div class="container-fluid">
        @include('store.includes.header')
        @include('store.includes.messages')

        <div class="row mt-5">
            <div class="col">
                <div class="row mb-4">
                    <div class="col">
                        <p class="mt-4 fw-bold text-center" style="font-size: 36px;"> سلة التسوق </p>
                    </div>
                </div>


                <div class="row">
                    @if( !empty( $cart   ) )
                    @foreach (  $cart as $id =>  $item  )
                    <div class="col-12 col-md-6 col-lg-4 mt-4 d-flex justify-content-center">
                        <div class="card donate">
                            <div class="position-relative">
                                <a href="#" target="_blank">
                                <img src="{{  asset($item['image'] ) }}"  height="250px";  class="card-img-top" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold"> {{ $item['name']   }} </h5>
                                <span>  {{ $item['desc'] }} </span>

                                <hr>
                                <span>  الكمية المطلوبة للمدرب : {{ $item['trainer_quantity'] }} </span>
                                <br>
                                <span>  الكمية المطلوبة للمتدرب : {{ $item['student_quantity'] }} </span>
                                <hr>
                                <span>  سعر النسخه للمدرب : {{ $item['trainer_price'] }} </span>
                                <br>
                                <span>  سعر النسخه للمتدرب : {{ $item['student_price'] }} </span>
                                <hr>
                                <span>  السعر الكلي  : {{ $item['total_price']  ?? ($item['trainer_quantity']* $item['trainer_price'] ) + (  $item['student_quantity']*$item['student_price']   )  }} </span>
                                <br>
                                <span>  نوع الشحن : {{ $item['shiping_type'] == 'from_office' ? 'استلام من المقر' : 'شحن الطلب' }} </span>


                                <br>
                                @if(    $item['shiping_type'] == 'shiping'  )
                                <span>  سعر الشحن  : {{ $item['shiping_price'] }} </span>
                                @endif

                                <div class="mt-3">


                                </div>

                                <div class="d-grid gap-2">
                                    @if( auth()->check() && auth()->user()->role_id == 3  )
                                    <a  href="{{ route('course.checkout' ,  $item['course_id']   ) }}"  class="btn fw-bold bg-primary" type="button">شراء الأن</a>
                                    @else
                                    <a  href="{{ route('home.getLogin') }}"  class="btn fw-bold bg-primary" type="button">شراء الأن</a>

                                    @endif
                                </div>
                                <div class="d-grid gap-2">
                                <a class="btn fw-bold bg-danger"  onclick=" return confirm('Do you really want to delete?') "   href="{{ route('course.cart_delete' , $item['course_id'] ) }}"  >حذف </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>





        </div>


        @include('store.includes.footer')



    </div>




    <script src="{{ asset('store/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="{{ asset('store/assets/css/slider/dist/sheetslider.min.js')}}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <script>
        $(".panel-header").click(function() {
            $(".fast-donation-panel").toggleClass("open");
        });
    </script>


<script>

    $(document).ready(function(){


      $("#type").change(function(){

        var type=$(this).val();



             if(type == "from_office")
             {

                var total_trainer = (   $("#trainer_price").val() *  $("#trainer_quantity").val()    ) ;
                var total_student= (    $("#student_price").val() *  $("#student_quantity").val()    ) ;
                var total = total_trainer + total_student ;
                 $('#total').show() ;
                 $('#total').text(' المبلغ الكلي = ' + total  ) ;
                // $('#total_price').val() = total  ;
                 document.getElementById('total_price').value= total ;


             }
             else{

                var total_trainer = (   $("#trainer_price").val() *  $("#trainer_quantity").val()    ) ;
                var total_student= (    $("#student_price").val() *  $("#student_quantity").val()    ) ;
                var total_quantity = parseInt  ( $("#trainer_quantity").val() )  +  parseInt( $("#student_quantity").val() )   ;
                var shiping_price =    $("#shiping_price").val() ;
                var shiping_total_price =   total_quantity * shiping_price  ;
                var total = total_trainer + total_student + shiping_total_price;
                 $('#total').show() ;
                 $('#total').text(' المبلغ الكلي = ' + total  ) ;
                // $('#total_price').val() = total  ;
                 document.getElementById('total_price').value= total ;



             }


       });
   });

   </script>

</body>

</html>





