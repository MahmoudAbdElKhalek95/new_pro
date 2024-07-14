<section  style="min-height: 5000px;">
    <div class="container">

        <div class="row">


            <div class="col-md-2" >
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                </div>
                <div class="card-body" style="text-align: center">
                    التسجيل في المنصة

                    <i class="fa fa-arrow-left" style="margin:35px;"></i>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>


              <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $follow->trainer_training()->count() > 0 ? 'checked' : ''  }}  >
                    </div>
                    <div class="card-body" style="text-align: center">
                        <a href="{{ route('getTrainerAvlableCourses')  }}"  target="_blank">
                           إمكانية التسجيل في الدورات

                           <i class="fa fa-arrow-left" style="margin:35px;"></i>
                        </a>
                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>


              <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                    </div>
                    <div class="card-body" style="text-align: center">

                        الاعتماد من الشركة

                        <i class="fa fa-arrow-left" style="margin:35px;"></i>

                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>

              <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $follow->orderCourses()->count() > 0 ? 'checked' : ''  }} >
                    </div>
                    <div class="card-body" style="text-align: center">
                        <a href="{{ route('getTrainerAvlableCourses')  }}"  target="_blank">
                        الاطلاع على الفرص التدريبية

                        <i class="fa fa-arrow-left" style="margin:35px;"></i>

                        </a>

                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>


              <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $follow->trainer_contract()->count() > 0 ? 'checked' : '' }} >
                    </div>
                    <div class="card-body" style="text-align: center">

                        التعاقد مع البيئة

                        <i class="fa fa-arrow-down" style="margin:35px;"></i>

                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>



        </div>


        <div class="row">

            <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                    </div>
                    <div class="card-body" style="text-align: center">
                        إقفال المشروع

                        <i class="fa fa-arrow-right" style="margin:35px;"></i>
                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>


              <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                    </div>
                    <div class="card-body" style="text-align: center">
                        <a href="{{ route('getTrainerCourses')  }}" target="_blank">
                        تقييم الحقائب والبيئه

                        <i class="fa fa-arrow-right" style="margin:35px;"></i>

                        </a>
                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>


              <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $follow->orderCourses()->where('status' , 'processing')->count() > 0 ? 'checked' : ''  }} >
                    </div>
                    <div class="card-body" style="text-align: center">
                       <a href="{{ route('trainings.index')  }}" target="_blank">
                        تنفيذ الدورة

                        <i class="fa fa-arrow-right" style="margin:35px;"></i>

                       </a>

                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>


              <div class="col-md-2" >
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                        {{  $follow->student_count() > 0 ? 'checked' : ''  }} >
                    </div>
                    <div class="card-body" style="text-align: center">
                        <a href="  {{ route('addStudents')  }} "  target="_blank">

                            تسجيل المتدربين

                            <i class="fa fa-arrow-right" style="margin:35px;"></i>

                        </a>

                    </div>
                    <div class="card-footer"></div>
                  </div>
                </div>

                <div class="col-md-2" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                                       >
                        </div>
                        <div class="card-body" style="text-align: center">

                            التواصل مع مدير المشروع

                            <i class="fa fa-arrow-right" style="margin:35px;"></i>


                        </div>
                        <div class="card-footer"></div>
                      </div>
                    </div>


        </div>



      </div>
</section>