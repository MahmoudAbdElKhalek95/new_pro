 <!-- Modal -->
 <div style="margin-top: 75px ; overflow-y:scroll;" class="modal fade " id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف سداد المبالغ والمتابعة</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('payments.update',$item->id) }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $id }}">

           @if( auth()->user()->role_id == 3  )
            <div class="col-md-12">
                <div class="selected-option">
                <div class="label">الحقيبة   </div>
                <select  class="form-select"  name ="course_id">
                    <option disabled  hidden >  الحقيبة   </option>
                   @foreach ( $courses  as  $c  )

                    <option value="{{ $c->id }}" {{  $item->course_id == $c->id  ? 'selected' : '' }} > {{  $c->name  }} </option>

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
              <div class="input-text">
                <div class="label">المبلغ المسدد</div>
                <input type="text"  name="price" value="{{ $item->price  }}" class="search form-control" placeholder="المبلغ المسدد">
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
                <input type="date" name="date" value="{{ $item->date }}" class="search form-control" placeholder="تاريخ السداد">
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
                    <option value="cash"  {{  $item->payment_way == 'cash' ? 'selected' : ' ' }} >نقد   </option>
                    <option value="check" {{  $item->payment_way == 'check' ? 'selected' : ' ' }} >شيك    </option>
                    <option value="transfer" {{  $item->payment_way == 'transfer' ? 'selected' : ' ' }}  >تحويل    </option>

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

                @if( !empty(  $item->file )  )
                    <img src ={{  asset( $item->file)  }} alt ="file" width="100px" height = "100px">
                @endif
                @error('file')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              @endif

              {{--   admin edit part    --}}

             @if(  auth()->user()->role_id == 1 ||   auth()->user()->role_id ==  2  )

             <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> 	الحالة  </div>
                  <select  class="form-select"  name ="status">
                    <option disabled  hidden > 	الحالة </option>
                    <option value="pending" {{ $item->status == 'pending'  }} >قيد المراجعة  </option>
                    <option value="accepted" {{ $item->status == 'accepted'  }} >مقبولة   </option>
                    <option value="rejected" {{ $item->status == 'rejected'  }}  >مرفوضة   </option>

                  </select>
                </div>
                @error('status')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	الملاحظات </div>
                  <input type="text"  name="note" value="{{ $item->note  }}" class="search form-control" placeholder="	الملاحظات ">
                </div>
                @error('note')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label"> بوليصة الشحن   </div>
                  <input type="file" name="attachment"  class="search form-control" ">
                </div>

                @if( !empty(  $item->attachment )  )
                    <img src ={{  asset( $item->attachment)  }} alt ="file" width="100px" height = "100px">
                @endif
                @error('attachment')
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
