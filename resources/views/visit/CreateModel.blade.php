 <!-- Modal -->
 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 style="margin-top: 70px;" class="modal-title" id="exampleModalLabel">
            أضف  الزيارات الميدانية
          </h5>
            <button style="margin-top: 70px;"  type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('visits.store') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>

            <div class="col-md-12">
                <div class="selected-option">
                <div class="label">مدير المشروع   </div>
                <select  class="form-select"  name ="project_manager_id" id="project_manager_id" >
                    <option disabled  hidden >  مدير المشروع   </option>

                    @foreach ( $project_managers  as  $pro )

                    <option value="{{ $pro->id }}" {{  old('project_manager_id') == $pro->name ? 'sekected' : '' }}>  {{ $pro->name }}    </option>

                    @endforeach
                  </select>
              </div>
               @error('project_manager_id')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
                <div class="selected-option">
                <div class="label">الجهة   </div>
                <select  class="form-select"  name ="company_id" id="company_id" >
                    <option disabled  hidden >  الجهة   </option>

                    @foreach ( $company  as  $comp )

                    <option value="{{ $comp->company->id ?? '' }}" {{  old('company_id') == $comp->name ? 'sekected' : '' }}>  {{ $comp->name }}    </option>

                    @endforeach
                  </select>
              </div>
               @error('company_id')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>



            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	سبب الزيارة </div>
                  <input type="text" name="reason" value="{{ old('reason') }}" class=" form-control" placeholder="	سبب الزيارة ">
                </div>
                 @error('reason')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	تاريخ الزيارة </div>
                  <input type="date" name="date" value="{{ old('date') }}" class=" form-control" placeholder="	تاريخ الزيارة ">
                </div>
                 @error('date')
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

