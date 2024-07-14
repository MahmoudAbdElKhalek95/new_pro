 <!-- Modal -->
 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف  الاستبانات</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>

         <div class="modal-body">

            <form  method="post"  action="{{ route('survay.store' ) }}">
                @csrf
               <div class="row">
                   <span class="mb-3" style="display: inline-block">معومات عامة</span>



                   <div class="col-md-12">
                       <div class="selected-option">
                         <div class="label"> الحقائب </div>
                         <select  class="form-select"  name ="course_id" >
                           <option   hidden >ابحث ب الحقائب من هنا</option>

                           @foreach ( $courses as  $item )

                           <option value="{{ $item->id }}" {{  $item->id == old('course_id')  }} >  {{  $item->name }}  </option>
                           @endforeach

                         </select>
                       </div>
                       @error('course_id')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                     </div>


                   <div class="col-md-12">
                       <div class="selected-option">
                         <div class="label"> نوع الاستبانة </div>
                         <select  class="form-select"  name ="question_type_id"  id ="type">
                           <option   hidden >ابحث ب نوع الاستبانة من هنا</option>

                           @foreach ( $types as  $item )

                           <option value="{{ $item->id }}" {{  $item->id == old('question_type_id') ? 'selected' : '' }} >
                              {{  $item->name }}  - {{  $item->type_name() }}
                             </option>
                           @endforeach

                         </select>
                       </div>
                       @error('question_type_id')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                     </div>



                     {{-- <span  id ="#questions">    </span> --}}

         <!-- Inline Radio start -->
           <section class="inline-radio">

               <div class="row match-height">
                 <div class="col-lg-12" id="question_card" style="display: none">
                   @foreach ( $data as $item  )
                   <div class="card question_row_all question_row_{{  $item->question_type_id }}" >
                     <div class="card-header">
                       {{-- add question here --}}

                       {{-- <input type="hidden" name="question[]" value = "   {{ $item->question }} " > --}}
                       <h4 class="card-title question"  >

                           {{ $item->question }}

                       </h4>
                       {{-- add question here --}}

                       <input type="hidden" name="question_id"  value="{{ $item->id }}">
                       <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                     </div>
                     <div class="card-content">
                       <div class="card-body">
                        @if(  $item->type == 'select' )

                           @foreach ( $item->answers_arr as $ans  )
                         <div class="d-inline-block custom-control custom-radio mr-1">
                           <input type="radio" class="custom-control-input" name="answers[{{ $item->question }}]" id="radio1"
                                                value = "{{ $ans }}" >
                           <label  class="custom-control-label ans " for="radio1"> {{ $ans }} </label>
                         </div>
                         @endforeach
                         @endif


                         @if(  $item->type == 'text' )


                        <div class="d-inline-block custom-control custom-radio mr-1"  @if(  $item->type !== 'text' ) style ="dispaly:none:" @endif >
                        <textarea type="text" placeholder="الاجابه"  class="form-control" rows="8" cols="50" name="answers[{{ $item->question }}]"  ></textarea>

                       </div>

                       @endif



                       </div>
                     </div>
                   </div>
                   @endforeach
                 </div>
               </div>
             </section>
             <!-- Inline Radio end -->




                   <button  type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
                 </div>
           </form>

        </div>

      </div>
    </div>
  </div>
