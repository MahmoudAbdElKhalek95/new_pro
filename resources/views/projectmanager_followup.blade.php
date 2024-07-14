
@extends('dashboard.layouts.mainapp')
@section('title' , 'متابعة المشاريع')
@section('styles')
@endsection


@section('content')
   <section class="main-content">
        <div class="container-fluid">


           <div class="analysis">
            <div class="row">

                 

                    <!-- start Project follow-up -->
                     <div class="projects-follow-up">
                        <h3>متابعة المشاريع   </h3>

                        {{-- start row1 --}}
                         <div class="row">
                            <div class="col-md-4">
                             <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                    <div class="statistics">
                                        
                                        <span>  التسجيل في المنصة </span>

                                    </div>
                                    <div class="text-center" >

                                        <input type="checkbox" class="" checked  style=" width: 30px ; height:30px ; " >

                                      </div>
                                      <i class="fa fa-arrow-left"></i>
                                </div>
                             </div>
                            </div>
                            <div class="col-md-4">
                              <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#fbe6e8">
                                    <div class="statistics">
                                        <a href="{  route('getCompany') }} " target="_blank">
                                      
                                        <span> استعراض الجهات التابعة</span>

                                        </a>
                                    </div>

                                     <div class="text-center">
                                        <input type="checkbox" class=""   style=" width: 30px ; height:30px ; ">
                                        
                                      </div>

                                      <i class="fa fa-arrow-left"></i>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="item">
                                <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                    <div class="statistics">
                                      
                                        <span> التأكد من جاهزية البيئات </span>
                                    </div>

                                    <div class="text-center">
                                        <input type="checkbox" class=""  style=" width: 30px ; height:30px ; ">
                                       
                                      </div>

                                      <i class="fa fa-arrow-down"></i>

                                </div>
                            </div>
                        </div>

                      
                       


                    </div>

                    {{-- end  row 1 --}}

                    <hr>
                       {{-- start row 2 --}}
                       <div class="row">
                   

                    <div class="col-md-4">
                        <div class="item">
                            <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                <div class="statistics">
                                  
                                    <span> عقد جلسات التطوير والتحسين</span>
                                </div>

                                <div class="text-center">
                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                                  
                                  </div>

                                  <i class="fa fa-arrow-right"></i>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="item">
                            <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                <div class="statistics">
                                    <a href="{{  route('visits.index') }} " target="_blank">
                                    <span> إجراء الزيارات الميدانية</span>
                                    </a>
                                </div>

                                <div class="text-center">
                                    <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                                  
                                  </div>

                                  <i class="fa fa-arrow-right"></i>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="item">
                            <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                                <div class="statistics">
                                    <a href="{{  route('getTrainer') }} " target="_blank">
                                    <span> التأكد من توفر المدربين</span>
                                    </a>
                                </div>

                                <div class="text-center">
                                    <input type="checkbox" class=""  style=" width: 30px ; height:30px ; ">
                                   
                                  </div>

                                  <i class="fa fa-arrow-right"></i>

                            </div>
                        </div>
                    </div>


                 


                </div>

                {{-- end  row 2 --}}

                <hr>
                <div class="row" >

                    <div class="col-md-4">
                        <div class="item">
                           <div class="box d-flex align-items-center justify-content-between" style="--background:#d4f8f7">
                               <div class="statistics">
                                   
                                   <span> إقفال المشروع </span>

                               </div>
                               <div class="text-center" >

                                   <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >

                                 </div>
                                 <i class="fa fa-arrow-right"></i>
                           </div>
                        </div>
                       </div>
                       <div class="col-md-4">
                         <div class="item">
                           <div class="box d-flex align-items-center justify-content-between" style="--background:#fbe6e8">
                               <div class="statistics">
                                   <a href="{{  route('reports.index') }} " target="_blank">
                                   <span>   شواهد التنفيذ النهائية   </span>
                                   </a>
                               </div>

                                <div class="text-center">
                                   <input type="checkbox" class=""   style=" width: 30px ; height:30px ; " >
                                   
                                 </div>

                                 <i class="fa fa-arrow-right"></i>

                           </div>
                       </div>
                   </div>

                </div>


                    <!-- End Project follow-up -->



                </div>

            </div>
           </div>
        </div>
    </section>



  </div>
<div class=" _modal trigger close-button"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection


