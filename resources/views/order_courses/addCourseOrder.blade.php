
@extends('dashboard.layouts.mainapp')
@section('title', 'نموذج طلب حقيبة')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            نموذج طلب حقيبة
          </h5>
    </div>

    <section class="cards-number">
        <form  method="post" enctype="multipart/form-data"  action="{{ route('addCourseOrder' , $courses->id) }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>

             

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	عدد النسخ المطلوبة للمدرب</div>
                      <input type="text"  name="trainer_quantity" value=" {{ old('trainer_quantity') }}"   class="search form-control" placeholder="	عدد النسخ المطلوبة للمدرب">

                    </div>

                    @error('trainer_quantity')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	عدد النسخ المطلوبة للمتدرب</div>
                      <input type="text"  name="student_quantity"  value=" {{ old('student_quantity') }}"   class="search form-control" placeholder="	عدد النسخ المطلوبة للمتدرب">
                    </div>
                      @error('student_quantity')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	تاريخ بداية التطبيق</div>
                      <input type="date"  name="date"  value="{{ old('date') }}"  class="search form-control" placeholder="	تاريخ بداية التطبيق">
                    </div>
                      @error('date')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>


                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	تاريخ  نهاية التطبيق</div>
                      <input type="date"  name="end_date"  value="{{ old('end_date') }}"  class="search form-control" placeholder="	تاريخ نهاية التطبيق">
                    </div>
                      @error('end_date')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div> --}}


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الوقت </div>
                      <input type="time"  name="time"   value="{{ old('time') }}"  class="search form-control" placeholder="	الوقت ">
                    </div>
                      @error('time')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>


                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">		عدد المشاركين</div>
                      <input type="text"  name="subscriber_number"  value=" {{ old('subscriber_number') }}"  class="search form-control" placeholder="		عدد المشاركين">
                    </div>
                      @error('subscriber_number')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div> --}}

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	اسم مستلم الشحنة</div>
                      <input type="text"  name="reciever_name" value=" {{ old('reciever_name') }}" class="search form-control" placeholder="	اسم مستلم الشحنة">
                    </div>
                      @error('reciever_name')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">		جوال المستلم</div>
                      <input type="text"  name="reciever_phone"   value=" {{ old('reciever_phone') }}"   class="search form-control" placeholder="		جوال المستلم">
                    </div>
                      @error('reciever_phone')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>


                <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label">   طريقة الشحن  </div>
                      <select  name="shipping_way"  class="form-select"  id ="shipping_way">
                        <option   value="null" >   اختر </option>
                        <option   value="receive_from_company" >   استلام من المقر </option>
                        <option   value="shipping" >   شحن الطلب </option>

                      </select>
                    </div>
                    @error('shipping_way')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>

                  {{-- <div class="col-md-12"  id ="shipping_price" style="display: none;">
                    <div class="input-text">
                      <div class="label">	مبلغ  الشحن</div>
                      <input type="text"  name="shipping_price"   value=" {{ old('shipping_price') }}"   class="search form-control" placeholder="	مبلغ  الشحن">
                    </div>
                      @error('shipping_price')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div> --}}

                  <div class="col-md-12"  >
                    <div class="input-text">
                      <div class="label">	عدد الساعات</div>
                      <input type="number"  name="hour_number"   value=" {{ old('hour_number') }}"   class="search form-control" placeholder="	عدد الساعات">
                    </div>
                      @error('hour_number')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>



                  <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label">   هل يوجد المدرب؟  </div>
                      <select  name="asd"  class="form-select"  id ="exsist">
                        <option    >   اختر </option>
                        <option   value="yes" >   نعم </option>
                        <option value="no" >   لا </option>

                      </select>
                    </div>
                    @error('exist')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>

                <div class="col-md-12"   id ="trainer" style="display: none;">
                    <div class="selected-option">
                      <div class="label"> المدرب</div>
                      <select  name="trainer_id"  class="form-select" >
                        <option  value="null"  hidden >  المدرب  </option>
                        @foreach ( $trainers as  $item)
                        <option value="{{  $item->trainer->id ?? '' }}"  {{  $item->trainer->id == old('trainer_id') ? 'selected' : ''   }} >  {{  $item->name }}</option>
                        @endforeach

                      </select>
                    </div>
                    @error('trainer_id')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>



                <input type="hidden"   name ="course_id" id="course_id"  value="{{ $courses->id }}">
                <input type="hidden"   name ="total_price" id="total_price"   >


                  <div class="col-md-12">

                    {{-- <div class="label">المبلغ المراد تسديده :
                      <span id="total" > </span>
                    </div> --}}
                    <button style="margin-bottom: 25px;"  type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>


                </div>
                <br><br>



              </div>
        </form>
    </section>



  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).ready(function(){
         console.log('asadaddad', '')


      $("#exsist").change(function(){

            var value = $(this).val();

            if( value == "yes"  )
            {

              $("#trainer").show();

            }

            if( value == "no"  )
            {

                $("#trainer").hide();
  

            }


       });


        ///////// shippping strat js ///////

         $("#shipping_way").change(function(){

            var value = $(this).val();

            if( value == "shipping"  )
            {

                $("#shipping_price").show();

            }else{

                $("#shipping_price").hide();

            }


       });

             /////////////////////// end shippping /**


      //////////// show price  ///////////

        //  $("#course_id").change(function(){

          var course= $("#course_id").val();


             if(course)
             {
               //alert ("value in if "+course ) ;
                 // console.log( course );
                 $.ajax({
                    // url:'getcourseunits/'+course,
                  //  url: '/course/'+course+'/amount/'+$("#student_quantity").val()+'/'+$("#trainer_quantity").val()  ,
                    url: '/course/'+course+'/amount/' ,

                     type:'GET',
                     dataType:'json',
                     success:function (data) {
                     //  alert('success') ;
                        console.log(data);

                        $("#total").text( data.total_amount ) ;
                       // $("#total_price").val( ) = ;

                        document.getElementById('total_price').setAttribute('value', data.total_amount ) ;


                     }

                 });
             }
             else{

              //  $("#total").text( " " ) ;
             }


      // });


      //////////////// end price


    });




   </script>
@endsection



