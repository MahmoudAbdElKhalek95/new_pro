 <!-- Modal -->
 <div class="modal fade " id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5  style="margin-top: 25px;"  class="modal-title" id="exampleModalLabel">أضف الداعمين</h5>
            <button style="margin-top: 25px;"  type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('supports.update',$item->id) }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $id }}">

            <div class="col-md-12">
                <div class="selected-option">
                <div class="label">النوع   </div>
                <select  class="form-select"  name ="type" id="type" >
                    <option disabled  hidden >  النوع   </option>
                  <option value="company"  {{  $item->type == "company" ? 'selected' : '' }}>  كيان    </option>
                  <option value="person"  {{  $item->type == "person" ? 'selected' : '' }} > شخصي    </option>

                  </select>
              </div>
               @error('type')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>


            <div class="col-md-12">
              <div class="input-text">
                <div class="label">الاسم</div>
                <input type="text"  name="name" value="{{ $item->name }}" class="search form-control" placeholder="الاسم">
              </div>
              @error('name')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <div class="input-text">
                <div class="label">رقم الجوال</div>
                <input type="text" name="phone" value="{{ $item->phone }}" class="search form-control" placeholder="رقم الجوال">
              </div>
              @error('phone')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>


            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	العنوان</div>
                  <input type="text" name="addres" value="{{ $item->addres  }}" class="search form-control" placeholder="	العنوان">
                </div>
                @error('addres')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


            <button  type="submit" class="btn btn-success form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
