 <!-- Modal -->
 <div class="modal fade " style="margin-top: 75px;"  id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف الزيارات الميدانية</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('visits.update',$item->id) }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $id }}">






              @if(  auth()->user()->role_id == 3 )


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">تاريخ الزيارة</div>
                  <input type="date"  name="date" value="{{ $item->date  }}" class="search form-control" placeholder="تاريخ الزيارة">
                </div>
                @error('date')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                 <div class="selected-option">
                   <div class="label"> 	الحالة  </div>
                   <select  class="form-select"  name ="status">
                     <option disabled  hidden > 	الحالة </option>

                     <option  value="pending" {{ $item->status == 'pending' ? 'selected' : ' '  }} >قيد المراجعة  </option>
                     <option value="accepted" {{ $item->status == 'accepted' ? 'selected' : ' '   }} >مقبولة   </option>
                     <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : ' '   }}  >مرفوضة   </option>


                   </select>
                 </div>
                 @error('status')
                 <div class="alert alert-danger" >
                  {{ $message }}
                 </div>
                 @enderror
               </div>



               @endif


               <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
