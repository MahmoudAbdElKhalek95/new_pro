<!-- The Modal -->
<div class="modal" id="myModal_{{ $id }}">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> {{ $course->name }}</h4>
           <br>


          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> --}}
        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <form method="POST" action="{{ route('course.addToCart' , $id ) }}" >

                @csrf

                <input type="hidden" id="trainer_price"  name="trainer_price" value="{{ $course->trainer_price}}">
                <input type="hidden" id="student_price" name="student_price" value="{{ $course->student_price}}">
                <input type="hidden" id="shiping_price" name="shiping_price" value="{{ \App\Models\Shiping::first()->price  }}">


            <div class="row">
               <div class="col-md-8">
                <label>
                    الكمية  للمدرب
                </label>
                <input type="number"   id="trainer_quantity" name="trainer_quantity" placeholder="الكمية  للمدرب" class="form-control" value="{{ $course->trainer_quantity }}">

                 </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                     <label>
                         الكمية  للمتدرب
                     </label>
                     <input type="number"   id="student_quantity" name="student_quantity" placeholder="الكمية  للمتدرب" class="form-control" value="{{ $course->student_quantity }}">

                     </div>
                 </div>

                 <div class="row">
                    <div class="col-md-8">
                     <label>
                         الشحن
                     </label>
                     <select id="type"  name="shiping_type" placeholder="الشحن" class="form-control" >
                        <option value="0"> select </option>
                        <option value="from_office">  استلام من المقر </option>
                        <option value="shiping">  شحن الطلب </option>

                     </select>

                     </div>

                 </div>

            <p class="" id ="total"  style="display: none">  المبلغ الكلي</p>
            <input type="hidden" id="total_price" name="total_price" value="" >


             <hr>
             <div class="row">
                <div class="col">
                   <input type="submit" class="btn btn-success rounded-2" value="add to cart">
                </div>
             </div>
            </form>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>

      </div>
    </div>
  </div>





