

 {{--  company --}}
 <section >
     <div class="container">

         <div class="row">


         <div class="col-md-4" >
             <div class="card">
                 <div class="card-header" style="text-align: center">
                     <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                 </div>
                 <div class="card-body" style="text-align: center">
                    تسجيل الجهة

                    <i class="fa fa-arrow-left" style="margin:25px;"></i>

                 </div>
                 <div class="card-footer text-center">
                    {{-- <i class="fa fa-arrow-left"></i> --}}
                 </div>
               </div>

             </div>

             


               <div class="col-md-4" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; "
                             {{  $follow->trainer_count() > 0 ? 'checked' : '' }} >

                     </div>
                     <div class="card-body" style="text-align: center">
                        <a href=" {{ route('companyAvailableCourses')   }}" target="_blank" >
                        إضافة مدرب
                        <i class="fa fa-arrow-left" style="margin:25px;"></i>
                       </a>
                     </div>
                     <div class="card-footer text-center">
                        {{-- <i class="fa fa-arrow-left"></i> --}}
                     </div>
                   </div>
                 </div>


               <div class="col-md-4" >
                 <div class="card">
                     <div class="card-header" style="text-align: center">
                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; "

                        {{  $follow->order_course()->count() > 0 ? 'checked' : ''  }} >
                     </div>
                     <div class="card-body" style="text-align: center">
                        <a href=" {{ route('getCourseOrder')  }} "  target="_blank">
                            طلب حقيبة

                        </a>

                     </div>
                     <div class="card-footer text-center">
                        <i class="fa fa-arrow-down"></i>
                     </div>
                   </div>
                 </div>

                </div>
                {{-- end first row --}
                {{--  start 2 row  --}}

                <div class="row">


                    <div class="col-md-4" >
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >
                        </div>
                        <div class="card-body" style="text-align: center">
                            إغلاق المشروع
                            <i class="fa fa-arrow-right" style="margin:25px;"></i>

                        </div>
                        <div class="card-footer text-center">
                           {{-- <i class="fa fa-arrow-left"></i> --}}
                        </div>
                      </div>

                    </div>



                      <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                               <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">

                            </div>
                            <div class="card-body" style="text-align: center">
                               <a href=" {{ route('reports.index')   }}" target="_blank" >
                                التقارير(يكون اختياري)

                                <i class="fa fa-arrow-right" style="margin:25px;"></i>

                              </a>
                            </div>
                            <div class="card-footer text-center">
                               {{-- <i class="fa fa-arrow-left"></i> --}}
                            </div>
                          </div>
                        </div>


                      <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                               <input type="checkbox" class=""  style=" width: 30px ; height:30px ; ">


                            </div>
                            <div class="card-body" style="text-align: center">
                               <a href="#"  >
                                شحن الطلب
                                <i class="fa fa-arrow-right" style="margin:25px;"></i>

                               </a>

                            </div>
                            <div class="card-footer text-center">
                               {{-- <i class="fa fa-arrow-left"></i> --}}
                            </div>
                          </div>
                        </div>

                       </div>
                       {{-- end first row --}}

                {{-- end 2 row  --}}



<br>





       </div>
 </section>
{{-- end company --}}


