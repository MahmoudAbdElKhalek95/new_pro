 <!-- Modal -->
 <div class="modal fade "  style="margin-top: 75px;"  id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف انواع التقارير</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('reports.update',$item->id) }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $id }}">



            {{-- <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> انواع التقارير </div>
                  <select  class="form-select"  name ="report_type_id">
                    <option disabled  hidden >انواع التقارير</option>

                    @foreach ( $report_types as  $r )

                    <option value="{{ $r->id }}" {{  $r->id ==  $item->report_type_id }} >  {{  $r->name }}  </option>
                    @endforeach

                  </select>
                </div>
                @error('report_type_id')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div> --}}

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الاسم</div>
                  <input type="text"  name="title" value="{{ $item->title ??  old('title') }}" class="search form-control" placeholder="الاسم">
                </div>
                @error('title')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الاسم</div>
                  <textarea type="text"  name="tedxt"  class="search form-control" placeholder="الوصف">{{ $item->text ??  old('tedxt') }}</textarea>
                </div>
                @error('tedxt')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">التقارير</div>
                  <input type="file"  name="report" value="{{ old('report') }}" class="search form-control" placeholder="التقارير">
                </div>
                @error('name')
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
