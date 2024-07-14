 <!-- Modal -->
 <div style="margin-top: 75px;" class="modal fade " id="edit_status_modal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">نموذج طلب حقيبة</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('editCourseOrder' , $id) }}">

           <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

         <div class="modal-body">
          <div class="row">
            {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

              <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> حالة الطلب </div>
                  <select  class="form-select"  name ="status" id ="status" >
                    <option disabled  hidden >  حالة الطلب</option>

                    <option value="revition" {{  $status == 'revition'  ? 'selected' : '' }} >قيد المراجعة </option>
                    <option value="pending" {{  $status == 'pending'  ? 'selected' : '' }} >بانتظار دفع المبلغ, </option>

                    <option value="processing" {{  $status == 'processing'  ? 'selected' : '' }} >قيد التنفيذ  </option>
                    <option value="confirmed"  {{  $status == 'confirmed'  ? 'selected' : '' }} >موكد  </option>

                    <option value="completed" {{  $status == 'completed'  ? 'selected' : '' }}  >مكتملة</option>

                  </select>
                </div>
                @error('age')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>



                  <div class="col-md-12" id="amount" style="display: none">
                       <div class="label">المبلغ المراد تسديده :  {{     $total_amount     }}
                          <span id="total" > </span>
                     </div>
                  </div>



                  <div class="col-md-12" id = "discount" style="display: none">
                    <div class="input-text">
                      <div class="label">	الخصم   </div>
                      <input type="text"  name="discount" value=" {{ old('discount') }}"   class="search form-control" placeholder= " الخصم ">

                    </div>

                    @error('discount')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>






            <button  type="submit" class="btn save-btn form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
