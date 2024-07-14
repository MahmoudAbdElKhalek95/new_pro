
@extends('dashboard.layouts.mainapp')
@section('title', ' الحقائب التدريبية')

@section('content')

    <div class="header-title-page">

        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            الحقائب التدريبية   
          
          </h5>
    </div>

     <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <form  method="post"  enctype="multipart/form-data" action="{{ route('updateCourse' , $courses->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <span class="mb-3" style="display: inline-block">معومات عامة</span>
                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">إسم الحقيبة</div>
                      <input type="text" name="name" value="{{  $courses->name ?? ''  }}" class="search form-control" placeholder="اسم الجهة">
                    </div>
                       @error('name')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">الوصف</div>
                      <textarea   name="desc" class=" ckeditor search form-control"> {!! $courses->desc   !!} </textarea>
                    </div>
                    @error('regulator')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>



                  <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label"> الفئة العمريه </div>
                      <select  class="form-select"  name ="age">
                        <option disabled  hidden >ابحث ب الفئة العمريه من هنا</option>
                        <option value="الإبتدائي" {{ $courses->age == 'الإبتدائي' ? 'selected' : '' }}>الإبتدائي</option>
                        <option value="المتوسط" {{ $courses->age == 'المتوسط' ? 'selected' : '' }}>المتوسط</option>
                        <option value="الثانوي" {{ $courses->age == 'الثانوي' ? 'selected' : '' }}>الثانوي</option>
                        <option value="الجامعي"{{ $courses->age == 'الجامعي' ? 'selected' : '' }}>الجامعي</option>
                        <option value="أخرى" {{ $courses->age == 'أخرى' ? 'selected' : '' }}>أخرى</option>

                      </select>
                    </div>
                    @error('age')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>



                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">غلاف الحقيبة </div>
                      <input type="file" name="image"  class="search form-control" placeholder="غلاف الحقيبة ">
                    </div>
                    @error('image')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>

                    {{-- new add   --}}

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">سعر نسخة المدرب</div>
                  <input type="number" name="trainer_price" value="{{ $courses->trainer_price }}" class="search form-control" placeholder="سعر نسخة المدرب">
                </div>
                   @error('trainer_price')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">سعر نسخة المتدرب</div>
                  <input type="number" name="student_price" value="{{ $courses->student_price}}" class="search form-control" placeholder="سعر نسخة المتدرب">
                </div>
                   @error('student_price')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              {{--  --}}

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">كمية المدرب</div>
                  <input type="number" name="trainer_quantity" value="{{ $courses->trainer_quantity }}" class="search form-control" placeholder="كمية المدرب">
                </div>
                   @error('trainer_quantity')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">كمية المتدرب</div>
                  <input type="number" name="student_quantity" value="{{ $courses->student_quantity}}" class="search form-control" placeholder="كمية المتدرب">
                </div>
                   @error('student_quantity')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

             {{--  --}}
              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">مجال الحقيبة</div>
                  <input type="text" name="field" value="{{ $courses->field }}" class="search form-control" placeholder="مجال الحقيبة">
                </div>
                   @error('field')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
                </div>

                 <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">مستوى الحقيبة</div>
                      <input type="text" name="level" value="{{ $courses->level  }}" class="search form-control" placeholder="مستوى الحقيبة">
                    </div>
                       @error('level')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                    </div>


                    <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">	عدد الساعات</div>
                          <input type="text" name="hour_number" value="{{ $courses->hour_number  }}" class="search form-control" placeholder="	عدد الساعات">
                        </div>
                           @error('hour_number')
                           <div class="alert alert-danger" >
                            {{ $message }}
                           </div>
                           @enderror
                        </div>


                        <div class="col-md-12">
                          <div class="input-text">
                            <div class="label">	 الساعات</div>
                            <input type="text" name="hours" value="{{ $courses->hours  }}" class="search form-control" placeholder="	 الساعات">
                          </div>
                             @error('hours')
                             <div class="alert alert-danger" >
                              {{ $message }}
                             </div>
                             @enderror
                          </div>

                          <div class="col-md-12">
                            <div class="input-text">
                              <div class="label">	 الانشطه</div>
                              <input type="text" name="activities" value="{{ $courses->activities  }}" class="search form-control" placeholder="	 الانشطه">
                            </div>
                               @error('activities')
                               <div class="alert alert-danger" >
                                {{ $message }}
                               </div>
                               @enderror
                            </div>

                            <div class="col-md-12">
                              <div class="input-text">
                                <div class="label">	 الوجدات</div>
                                <input type="text" name="units" value="{{ $courses->units  }}" class="search form-control" placeholder="	 الوجدات">
                              </div>
                                 @error('units')
                                 <div class="alert alert-danger" >
                                  {{ $message }}
                                 </div>
                                 @enderror
                              </div>

                              
                            <div class="col-md-12">
                              <div class="input-text">
                                <div class="label">	 فكرة البرنامج</div>
                                <input type="text" name="ideas" value="{{ $courses->ideas  }}" class="search form-control" placeholder="	 فكرة البرنامج">
                              </div>
                                 @error('ideas')
                                 <div class="alert alert-danger" >
                                  {{ $message }}
                                 </div>
                                 @enderror
                              </div>
  
                                  
                            <div class="col-md-12">
                              <div class="input-text">
                                <div class="label">	 اهداف البرنامج</div>
                                <input type="text" name="goals" value="{{ $courses->goals  }}" class="search form-control" placeholder="	 اهداف البرنامج">
                              </div>
                                 @error('goals')
                                 <div class="alert alert-danger" >
                                  {{ $message }}
                                 </div>
                                 @enderror
                              </div>


                           
                              <div class="input-text">
                                <div class="label">	 الكفابات</div>
                                <input type="text" name="kfayat" value="{{ $courses->kfayat  }}" class="search form-control" placeholder="	 الكفابات">
                              </div>
                                 @error('kfayat')
                                 <div class="alert alert-danger" >
                                  {{ $message }}
                                 </div>
                                 @enderror
                              </div>
  



                        @if(  auth()->user()->role_id == 1 ||   auth()->user()->role_id ==  2  )

                        <div class="col-md-12">
                           <div class="selected-option">
                             <div class="label"> 	الحالة  </div>
                             <select  class="form-select"  name ="status">
                               <option disabled  hidden > 	الحالة </option>
                               <option value="1" {{ $courses->status == '1'  }} >  مستمره  </option>
                               <option value="0" {{ $courses->status == '0'  }} > منتهية   </option>

                             </select>
                           </div>
                           @error('status')
                           <div class="alert alert-danger" >
                            {{ $message }}
                           </div>
                           @enderror
                         </div>
                         <br><br><br>
                         @endif



                 {{--  end add  --}}




                <button  type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
        </form>
      </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>


@endsection



