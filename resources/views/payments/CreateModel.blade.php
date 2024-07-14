 <!-- Modal -->
 <div  style ="margin-top:75px ; overflow-y:scroll;"    class="modal fade "  id="pay_modal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف سداد المبالغ والمتابعة</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('payments.store') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>


          <input type="hidden" name="order_id"  value="{{ $item->id }}">
          <input type="hidden" name="course_id"  value="{{ $item->course_id }}" >



          <span class="mb-3" style="display: inline-block"> الحقيبة : {{  $item->course->name ?? null   }} </span>


            <div class="col-md-12">

                <div class="label"> المبلغ الكلي :
                    <span id="total" > {{  $item->previous_payed()   +   $item->total_price   }} </span>
                  </div>

                <div class="label"> المبالغ المسدده :
                    <span id="total" > {{  $item->previous_payed()   }} </span>
                  </div>

                  <div class="label" style="font-weight: bold;">المبلغ المراد تسديده :
                    <span  id="total" > {{  $item->total_price ?? null  }} </span>
                  </div>


              </div>
              <br><br>


            <div class="col-md-12">
              <div class="input-text">
                <div class="label">المبلغ المسدد</div>
                <input type="text"  name="price" value="{{ old('price') }}" class="search form-control" placeholder="المبلغ المسدد">
              </div>
              @error('price')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <div class="input-text">
                <div class="label">تاريخ السداد</div>
                <input type="date" name="date" value="{{ old('date') }}" class="search form-control" placeholder="تاريخ السداد">
              </div>
              @error('date')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>


            <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> 	طريقة السداد  </div>
                  <select  class="form-select"  name ="payment_way">
                    <option disabled  hidden > 	طريقة السداد </option>
                    <option value="cash">نقد   </option>
                    <option value="check">شيك    </option>
                    <option value="transfer">تحويل    </option>

                  </select>
                </div>
                @error('role_id')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">إيصال السداد  </div>
                  <input type="file" name="file"  class="search form-control" ">
                </div>

                @error('file')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>

