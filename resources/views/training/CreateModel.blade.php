 <!-- Modal -->
 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف الدورات</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('trainings.store') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>

            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	اسم الدورة </div>
                  <input type="text" name="name" value="{{ old('name') }}" class="search form-control " placeholder="	اسم الدورة ">
                </div>
                   @error('name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror

              </div>


              <div class="col-md-12">
                <div class="selected-option">
                <div class="label">المنطقة  </div>
                <select  class="form-select"  name ="city_id">
                    <option disabled selected hidden >  المنطقة  </option>
                   @foreach ( $cities  as  $item )

                    <option value="{{ $item->id }}"> {{  $item->name  }} </option>

                   @endforeach

                  </select>
              </div>
               @error('city_id')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	من </div>
                  <input type="date" name="from" value="{{ old('from') }}" class="search form-control" placeholder="	من ">
                </div>
                   @error('from')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	إلى </div>
                  <input type="date" name="to" value="{{ old('to') }}" class="search form-control" placeholder="	إلى ">
                </div>
                   @error('to')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              {{-- <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	الجهة المنفذة </div>
                  <input type="text" name="company_name" value="{{ old('company_name') }}" class="search form-control" placeholder="	الجهة المنفذة ">
                </div>
                   @error('company_name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div> --}}

              {{-- <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	المدرب </div>
                  <input type="text" name="trainer_name" value="{{ old('trainer_name') }}" class="search form-control" placeholder="	المدرب ">
                </div>
                   @error('trainer_name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div> --}}

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	عدد الساعات </div>
                  <input type="number" name="hour_number" value="{{ old('hour_number') }}" class="search form-control" placeholder="	عدد الساعات ">
                </div>
                   @error('hour_number')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              {{-- <div class="col-md-12">
                <div class="input-text">
                  <div class="label">شهادة  </div>
                  <input type="file" name="cert"  class="search form-control" placeholder="الصورة الشخصية">
                </div>
                @error('cert')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div> --}}


            <button  type="submit" class="btn save-btn form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
