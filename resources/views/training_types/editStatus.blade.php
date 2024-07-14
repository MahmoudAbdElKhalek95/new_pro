 <!-- Modal -->
 <div style="margin-top:75px " class="modal fade " id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
           <h5 class="modal-title" id="exampleModalLabel">أضف الدورات - طلبات التسجيل</h5>
             <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
         </div>
         <hr>
         <form  method="post" enctype="multipart/form-data" action="{{ route('trainings.registerstatus',$item->id) }}">
          @csrf
          <div class="modal-body">
           <div class="row">
             {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

             <input type="hidden" name="_method" value="PUT">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input type="hidden" name="id" value="{{ $id }}">


               {{--   admin edit part    --}}

              @if(  auth()->user()->role_id == 1 )

              <div class="col-md-12">
                 <div class="selected-option">
                   <div class="label"> 	الحالة  </div>
                   <select  class="form-select"  name ="status">
                     <option disabled  hidden > 	الحالة </option>
                     <option  value="pending" {{ $item->status == 'pending'  ? 'selected' : ' '  }} >قيد المراجعة  </option>
                     <option value="accepted" {{ $item->status == 'accepted' ? 'selected' : ' '   }} >مقبولة   </option>
                     <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : ' '   }}  >مرفوضة   </option>
                     <option value="completed" {{ $item->status == 'completed'  ? 'selected' : ' '  }}  > مكتمله   </option>

                   </select>
                 </div>
                 @error('status')
                 <div class="alert alert-danger" >
                  {{ $message }}
                 </div>
                 @enderror
               </div>


               @endif


             <button  type="submit" class="btn save-btn form-control"> حفظ  </button>
           </div>
         </div>
         </form>
       </div>
     </div>
   </div>
