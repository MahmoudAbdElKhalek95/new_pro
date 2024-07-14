
 @php

$payments = \App\Models\Payment::where('company_id' ,  $item->company_id )
                                ->where('course_id' , $item->course_id)
                                ->where('order_id' , $item->id)
                                ->where('status' , 'accepted')->get();

 @endphp
 <!-- Modal -->
 <div  style ="margin-top:75px ; overflow-y:scroll;"    class="modal fade "  id="payed_modal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable " >
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">المبالغ المسدده</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>

         <div class="modal-body">

                {{-- table -start --}}

           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table"  >
              <thead>
              <tr class="head-table">

                <th scope="col">
                        الحقيبة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        المبلغ المسدد
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        تاريخ السداد
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                 <th scope="col">
                        طريقة السداد
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        إيصال السداد
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    بوليصة الشحن
                  <i class="fa fa-exchange" aria-hidden="true"></i>
               </th>

                <th scope="col">
                       حالة السداد
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                 </th>

                 <th scope="col">
                      الملاحظات
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                 </th>

              </tr>
              </thead>
              <tbody>

            @forelse ( $payments as $item )

            <tr>

                <td>  {{ $item->course->name ?? '' }}  </td>
                <td>  {{ $item->price ?? '' }}  </td>
                <td>  {{ $item->date ?? '' }}  </td>
                <td>  {{ $item->payment_way_name() ?? '' }}  </td>

                     <td>
                        <a href="{{ asset( $item->file ) }} "   download >
                         <img src="  {{ asset( $item->file ) }} "  alt="file" width="100px  " height="100px ;"  >
                        </a>
                    </td>

                    <td>
                        <a href="{{ asset( $item->attachment ) }} "  download >
                        <img src="  {{ asset( $item->attachment ) }} "  alt="file" width="100px  " height="100px ;"  >
                        </a>
                     </td>

                    <td>  {{  $item->status_name() ?? '' }}  </td>
                    <td>  {{   $item->note ?? '' }}  </td>

              </tr>

            @empty

            <p class="text-center" style="color: red;">    لايوجد بيانات لعرضها </p>

            @endforelse ( $payments as $item )


              </tbody>
            </table>




          </div>


           {{-- end table --}}

        </div>

      </div>
    </div>
  </div>

