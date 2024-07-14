
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
                        <p class="mt-4 fw-bold text-center" style="font-size: 36px;">الحقائب</p>
                    </div>
                </div>


                <div class="row" style="margin-top: 72px; margin-bottom: 72px;row-gap: 12px;">
                    <div style="margin-right: 100px;" class="col-12 col-lg-5 justify-content-center justify-content-lg-start d-flex flex-column">
                        <img src="{{  asset($courses->image_path ) }}" width="250" height="250" alt="">

                        
                        <div class="mb-3">
                            <span>  سعر النسخه للمدرب : {{ $courses->trainer_price }} </span>

                        </div>
                        <div class="mb-3">
                            <span>  سعر النسخه للمتدرب : {{ $courses->student_price }} </span>

                        </div>


                        <div class="mb-3">

                            {{--  --}}
                            <form method="POST" action="{{ route('course.addToCart' , $courses->id ) }}" >

                                @csrf

                                <input type="hidden" id="trainer_price"  name="trainer_price" value="{{ $courses->trainer_price}}">
                                <input type="hidden" id="student_price" name="student_price" value="{{ $courses->student_price}}">
                                <input type="hidden" id="shiping_price" name="shiping_price" value="{{ \App\Models\Shiping::first()->price  }}">

                            <div class="row">
                               <div class="col-md-12">
                                <label>
                                    الكمية  للمدرب
                                </label>
                                {{-- <input type="number"   required id="trainer_quantity" name="trainer_quantity" placeholder="الكمية  للمدرب" class="form-control" value="{{ $courses->trainer_quantity }}"> --}}
                                <input type="number"   required id="trainer_quantity" name="trainer_quantity" placeholder="الكمية  للمدرب" class="form-control" value="0">

                                 </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                     <label>
                                         الكمية  للمتدرب
                                     </label>
                                     {{-- <input type="number"  required  id="student_quantity" name="student_quantity" placeholder="الكمية  للمتدرب" class="form-control" value="{{ $courses->student_quantity }}"> --}}
                                     <input type="number"  required  id="student_quantity" name="student_quantity" placeholder="الكمية  للمتدرب" class="form-control" value="0">


                                     </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-md-12">
                                     <label>
                                         الشحن
                                     </label>
                                     <select id="type"  name="shiping_type" placeholder="الشحن" class="form-control" required >
                                        <option value="0"> select </option>
                                        <option value="from_office">  استلام من المقر </option>
                                        <option value="shiping">  شحن الطلب </option>

                                     </select>

                                     </div>

                                 </div>

                            <p class="" id ="total"  style="display: none">  المبلغ الكلي</p>
                            <input type="hidden" id="total_price" name="total_price" value="" >


                             <hr>
                             {{-- <div class="row">
                                <div class="col">
                                   <input type="submit" class="btn btn-success rounded-2" value="add to cart">
                                </div>
                             </div> --}}


                            {{--  --}}
                        </div>
                        {{-- <button class="btn fw-bold bg-primary mt-4 align-self-center align-self-lg-start w-100" type="button"  data-bs-toggle="modal" data-bs-target="#myModal_{{  $courses->id  }}">
                            شراء الأن
                           </button> --}}
                           <button class="btn fw-bold bg-primary mt-4 align-self-center align-self-lg-start w-100" type="submit" >
                            شراء الأن
                           </button>
                        </form>
                           {{-- @include('courseModal' , ['id' =>  $courses->id , 'course' =>  $courses  ]) --}}
                    


                    </div>
                    {{-- <span style="float: left">   {{ $courses->age }} </span> --}}
                    <div style="margin-right: 100px" class="col-12 col-lg-5 justify-content-lg-start d-flex flex-column">
                        <h2 class="fw-bold text-center"> {{ $courses->name  }} </h2>

                        <h5 class="fw-bold">   فكره البرنامج </h5>
                        <span> {{ $courses->ideas ?? null   }} </span>
                        <h5 class="fw-bold ">   اهداف البرنامج </h5>
                        <span> {{ $courses->goals ?? null   }} </span>
                        <h5 class="fw-bold">    الكفايات </h5>
                        <span> {{ $courses->kfayat ?? null   }} </span>


                        {{-- <h5 class="fw-bold">    الوصف </h5> --}}
                        <P class="mb-1 lead"> {!! $courses->desc   !!}   </P>


                        

                       
                </div>
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



        if(type == "shiping")
     {

        var total_trainer = (   $("#trainer_price").val() *  $("#trainer_quantity").val()    ) ;
        var total_student= (    $("#student_price").val() *  $("#student_quantity").val()    ) ;
        var total_quantity = parseInt  ( $("#trainer_quantity").val() )  +  parseInt( $("#student_quantity").val() )   ;
        var shiping_price =    $("#shiping_price").val() ;
      // alert( total_quantity )


       // var shiping_price =  {{  shipping_price( 5  ) }}
       // var shiping_total_price =   total_quantity * shiping_price  ;
        //var total = total_trainer + total_student + shiping_price;
        var total = total_trainer + total_student  ;  // + shiping_price;

         $('#total').show() ;
         $('#total').text(' المبلغ الكلي = ' + total  ) ;
        // $('#total_price').val() = total  ;
         document.getElementById('total_price').value= total ;





     }
     else{

        var total_trainer = (   $("#trainer_price").val() *  $("#trainer_quantity").val()    ) ;
        var total_student= (    $("#student_price").val() *  $("#student_quantity").val()    ) ;
        var total = total_trainer + total_student ;
         $('#total').show() ;
         $('#total').text(' المبلغ الكلي = ' + total  ) ;
        // $('#total_price').val() = total  ;
         document.getElementById('total_price').value= total ;



     }


       });



       //////////////////////////////////////

    $("#trainer_quantity").mouseleave(function(){

     var type=$(this).val();
       //  alert("Asad") ;
     if(type == "shiping")
     {

        var total_trainer = (   $("#trainer_price").val() *  $("#trainer_quantity").val()    ) ;
        var total_student= (    $("#student_price").val() *  $("#student_quantity").val()    ) ;
        var total_quantity = parseInt  ( $("#trainer_quantity").val() )  +  parseInt( $("#student_quantity").val() )   ;
        //var shiping_price =    $("#shiping_price").val() ;
       // var shiping_total_price =   total_quantity * shiping_price  ;
      //  var total = total_trainer + total_student + shiping_total_price;
        var total = total_trainer + total_student    ; // +   shiping_total_price;

         $('#total').show() ;
         $('#total').text(' المبلغ الكلي = ' + total  ) ;
        // $('#total_price').val() = total  ;
         document.getElementById('total_price').value= total ;

     }
     else{

        var total_trainer = (   $("#trainer_price").val() *  $("#trainer_quantity").val()    ) ;
        var total_student= (    $("#student_price").val() *  $("#student_quantity").val()    ) ;
        var total = total_trainer + total_student ;
         $('#total').show() ;
         $('#total').text(' المبلغ الكلي = ' + total  ) ;
        // $('#total_price').val() = total  ;
         document.getElementById('total_price').value= total ;

     }


});



 ///////////////////////////////////////////

 $("#student_quantity").mouseleave(function(){

var type=$(this).val();
  //  alert("Asad") ;
if(type == "shiping")
{

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
else{

   var total_trainer = (   $("#trainer_price").val() *  $("#trainer_quantity").val()    ) ;
   var total_student= (    $("#student_price").val() *  $("#student_quantity").val()    ) ;
   var total = total_trainer + total_student ;
    $('#total').show() ;
    $('#total').text(' المبلغ الكلي = ' + total  ) ;
   // $('#total_price').val() = total  ;
    document.getElementById('total_price').value= total ;

}


});




 ////////////////////////////////////////////////////



   });

   </script>

</body>

</html>





