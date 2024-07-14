
@extends('dashboard.layouts.mainapp')
@section('title', ' الاستبانات')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
             الاستبانات
          </h5>
    </div>

    <section class="cards-number" style="min-height: 950px;">
        <form  method="post"  action="{{ route('questions.update' , $question->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>


                <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label"> نوع الاستبانة </div>
                      <select  class="form-select"  name ="question_type_id">
                        <option disabled  hidden >ابحث ب نوع الاستبانة من هنا</option>

                        @foreach ( $types as  $item )

                        <option value="{{ $item->id }}" {{  $item->id == $question->question_type_id ? 'selected' : ''  }} >  {{  $item->name }}  </option>

                        @endforeach

                      </select>
                    </div>
                    @error('question_type_id')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label">   نوع السوال    </div>
                      <select  name="type"  class="form-select"  id ="type">
                        <option    >   اختر </option>
                        <option   value="select" {{   $question->type == 'select' ? 'selected' : ''  }} >   اختيار من متعدد  </option>
                        <option value="text"  {{   $question->type == 'text' ? 'selected' : ''  }} >  مقالي </option>

                      </select>
                    </div>
                    @error('exist')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>

                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	السؤال </div>
                      <input type="text" name="question" value="{{ $question->question  }}" class="search form-control" placeholder=" السؤال ">
                    </div>
                       @error('question')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>



              {{-- <div class="col-md-12" id="text"  @if( $question->type !=='text' ) style="display: none;" @endif >
                <div class="input-text">
                  <div class="label">	الإجابه</div>
                  <input type="text" name="text_answer" value="{{  $question->text_answer }}" class="search form-control" placeholder=" الإجابه ">
                </div>
                   @error('text_answer')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div> --}}


                     <!-- Form repeater section start -->

                     @if ( !empty ( $question->getAnswers() )   )



                  <div class="form-group col-12 mb-2 contact-repeater" id = "select"  @if( $question->type !=='select' ) style="display: none;" @endif >

                    @foreach ( $question->getAnswers()  as  $ans  )
                    <div data-repeater-list="repeater-group">
                      <div class="input-group mb-1" data-repeater-item>
                        <div class="label">	الإجابات  - {{  $ans }} </div>
                        <input type="tel" placeholder="  {{ $ans }} - الإجابات"  name="answers"   class="form-control" id="example-tel-input">
                        <span class="input-group-append" id="button-addon2">
                          <button class="btn btn-danger" type="button" data-repeater-delete><i class="fa fa-trash"></i> </button>
                        </span>
                      </div>
                    </div>

                    @endforeach
                    @error('question')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                    <button type="button" data-repeater-create class="btn btn-primary" style="margin-right: 75px !important;;">
                      <i class="ft-plus"></i>  add new +
                    </button>
                  </div>

                  @else

                  <div class="form-group col-12 mb-2 contact-repeater" id ="select"  @if( $question->type !=='select' ) style="display: none;" @endif >
                    <div data-repeater-list="repeater-group">
                      <div class="input-group mb-1" data-repeater-item>
                        <div class="label">	الإجابات  </div>
                        <input type="tel" placeholder="الإجابات"  name="answers"  class="form-control" id="example-tel-input">
                        <span class="input-group-append" id="button-addon2">
                          <button class="btn btn-danger" type="button" data-repeater-delete><i class="fa fa-trash"></i> </button>
                        </span>
                      </div>
                    </div>

                    @error('question')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                    <button type="button" data-repeater-create class="btn btn-primary" style="margin-right: 75px !important;;">
                      <i class="ft-plus"></i>  add new +
                    </button>
                  </div>

                  @endif

                 <!-- // Form repeater section end -->

                <button  type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
        </form>
    </section>

  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).ready(function(){
         console.log('asadaddad', '')


      $("#type").change(function(){


            var value = $(this).val();

            if( value == "select"  )
            {

                $("#select").show();
                $("#text").hide();


            }

            if( value == "text"  )
            {

                $("#text").show();
                $("#select").hide();


            }


       });
   });

   </script>

@endsection





