
@extends('dashboard.layouts.mainapp')
@section('title', 'سعر الشحن')
@section('content')



     <!-- Start page content -->
<section class="supervisors-accounts">
     <div class="container-fluid">
        <form  method="post"  enctype="multipart/form-data"  action="{{ route('shiping.update' , $Shiping->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <span class="mb-3" style="display: inline-block">سعر الشحن</span>


                <div class="row mb-2 ">
                    <div class="col-md-10">
                        <div class="input-field w-100">
                            <label>
                                عدد النسخ من
                             </label>
                            <input type="text" name="quantity_from" value="{{ $Shiping->quantity_to  ?? old('quantity_from') }}"  placeholder=" عدد النسخ من   ">
                        </div>
                        @error('quantity_from')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                   </div>
                </div>

                <div class="row mb-2 ">
                    <div class="col-md-10">
                        <div class="input-field w-100">
                            <label>
                                عدد النسخ الي
                             </label>
                            <input type="text" name="quantity_to" value="{{  $Shiping->quantity_to  ?? old('quantity_to') }}"  placeholder=" عدد النسخ الي   ">
                        </div>
                        @error('quantity_to')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                   </div>
                </div>


                <div class="col-md-10">
                    <div class="input-text">
                      <div class="label">	سعر الشحن</div>
                      <input type="text" name="price" value="{{ $Shiping->price }}" class="search form-control " placeholder="	سعر الشحن">
                    </div>
                       @error('price')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>






                <button  style="margin-top: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
          </form>
      </div>
    </section>



@endsection



