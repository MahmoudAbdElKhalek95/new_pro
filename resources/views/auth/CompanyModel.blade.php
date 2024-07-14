 <!-- Modal -->
 <div class="modal fade " id="CompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">سجل كجهــة منفذة</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('createCompany') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>
            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">اسم الجهة * </div>
                  <input type="text" name="company_name" value="{{ old('company_name') }}" class="search form-control" placeholder="اسم الجهة">
                </div>
                   @error('company_name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الجهة المشرفة *  <span style="font-size: small"> </span></div>
                  <input type="text"  name="regulator" value="{{ old('regulator') }}" class="search form-control" placeholder="   وزارة التجارة -  وزارة الشؤون الإسلامية -الخ ">
                </div>
                @error('regulator')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">المدير التنفيذي *  </div>
                  <input type="text"  name="name" value="{{ old('name') }}" class="search form-control" placeholder="المدير التنفيذي">
                </div>
                @error('name')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">رقم التصريح * </div>
                  <input type="text"  name="clearance_no" value="{{ old('clearance_no') }}" class="search form-control" placeholder="رقم التصريح">
                </div>
                @error('clearance_no')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>



              <div class="col-md-12">
                <div class="selected-option">
                <div class="label">المنطقه *  </div>
                <select  class="form-select"  name ="city_id">
                    <option disabled selected hidden >  المنطقه  </option>
                   @foreach ( $cities  as  $item )

                    <option style="color: black;" value="{{ $item->id }}" {{  old('city_id') == $item->id  ? 'selected' : '' }} > {{  $item->name  }} </option>

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
                <div class="selected-option">
                <div class="label">المدينة *   </div>
                <select  class="form-select"  name ="state_id">
                    <option disabled selected hidden >  المدينة   </option>
                   @foreach ( $states  as  $item  )

                    <option  style="color: black;" value="{{ $item->id }}" {{  old('state_id') == $item->id  ? 'selected' : '' }} > {{  $item->name  }} </option>

                   @endforeach

                  </select>
              </div>
               @error('state_id')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
              <div class="input-text">
                <div class="label">البــريد الإلكتروني *  </div>
                <input type="email"  name="email" value="{{ old('email') }}" class="search form-control" placeholder="البــريد الإلكتروني">
              </div>
              @error('email')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-12">
              <div class="input-text">
                <div class="label">الجـوال * </div>
                <input type="text" name="phone" value="{{ old('phone') }}" class="search form-control" placeholder="الجـوال">
              </div>
              @error('phone')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">صورة التصريح</div>
                  <input type="file" name="doc_path"  class="search form-control" placeholder="صورة التصريح">
                </div>
                @error('doc_path')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              {{--  new add  --}}



            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">العنوان الوطني</div>
                  {{-- <input type="text" name="national_address"  value="{{ old('national_address') }}"  class="search form-control" placeholder="العنوان الوطني"> --}}
                  <input type="file" name="national_address"  value="{{ old('national_address') }}"  class="search form-control" placeholder="العنوان الوطني">

                </div>
                @error('national_address')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الرقم الضريبي</div>
                  <input type="number" name="tax_number"  value="{{ old('tax_number') }}" class="search form-control" placeholder="الرقم الضريبي">
                </div>
                @error('tax_number')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">رقم السجل</div>
                  <input type="number" name="record_number"  value="{{ old('record_number') }}" class="search form-control" placeholder="رقم السجل">
                </div>
                @error('record_number')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              {{-- <div class="col-md-12">
                <div class="input-text">
                  <div class="label">صورة التصريح</div>
                  <input type="file" name="attachment"  value="{{ old('attachment') }}" class="search form-control" placeholder="صورة التصريح">
                </div>
                @error('attachment')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div> --}}



              {{--  end new add  --}}

            <hr>
            <span class="mb-3"  style="display: inline-block">تعيين كلمة المرور</span>
            <div class="col-md-12">
              <div class="input-text">
                <div class="label" >اكتب كلمة السر * </div>
                <input type="password" name="password" class="search password form-control" placeholder="اكتب كلمة السر">
                <span class="input-group-text togglePassword" >
                 <i class="fa fa-eye-slash" aria-hidden="true"></i>
                </span>
              </div>
              @error('password')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-12">
              <div class="input-text">
                <div class="label" >اعد كتابة كلمة السر</div>
                <input type="password" name="password_confirmation"  class="search password form-control" placeholder="اعد كتابة كلمة السر">
                <span class="input-group-text togglePassword" >
                  <i class="fa fa-eye-slash" aria-hidden="true"></i>
                </span>
              </div>
              @error('password_confirmation')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-check mx-3">
                <input class="form-check-input" name="status"   type="checkbox" value="" id="flexCheckDefault8">
                <label class="form-check-label" for="flexCheckDefault8">
                  أوافق على
                  <a href="{{ route('terms') }}" target="_blank">الشروط والأحكام</a>
                </label>
              </div>

            <button  type="submit" class="btn save-btn form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).ready(function(){
         console.log('asadaddad', '')


      $("#qualifacation").change(function(){


       // alert("Asd" + $(this).val() )
            var value = $(this).val();

            if( value == "الثانوي"  )
            {

                $("#specialization").hide();


            }else{

                $("#specialization").show();

            }


       });
   });


   //////////////////////////////////////////////

   $('select[name="city_id"]').on('change',function () {
                console.log('changeed');
             //   alert(' changeed ');

                var City=$(this).val();

                if(City)
                {
                  //  alert ("value in if "+City ) ;
                     console.log( City );
                    $.ajax({
                        url:'getCityStates/'+City,
                        type:'GET',
                        dataType:'json',
                        success:function (data) {
                         //alert('success') ;
                           console.log(data);
                            $('select[name="state_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="state_id"]')
                                    .append('<option style="color: black;" value="'+key+'">'+value+'</option>')


                            });
                        }

                    });
                }
                else{
                    $('select[name="state_id"]').empty();
                }


            });





   ///////////////////////////////////////////////

   </script>
