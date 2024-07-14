<div class="sheetSlider sh-default sh-auto">
    <input id="s1" type="radio" name="slide1" checked="">
    @for( $item = 1 ; $item <  $slider->count() ; $item++   )
    <input id="s{{ $item+1 }}" type="radio" name="slide1">
    @endfor
  
    <div class="sh__content">

        @foreach ( $slider as $item )
        
        <!-- Slider Item -->
        <div class="sh__item">
            <img src="{{  asset($item->image) }}" alt="imgText">
            <!-- Item Info -->
            <div class="sh__meta" style="display: block !important;">
                <h4 class="mb-2">{{ $item->title  }}</h4>
                {{-- <button style="background-color: #fff; color: #508ABB; border-radius: 20px;width: 140px;box-shadow: 0 2px 6px 0 rgb(0 0 0 / 29%);" class="btn fw-bold" type="button">تبرع الأن</button> --}}
            </div>
        </div>

        @endforeach

       

    </div>
    <!-- .sh__content -->

    <!--botones -->
    <div class="sh__btns" style="display: flex !important;">
        <label for="s1"></label>

        @for( $item = 1 ; $item <  $slider->count() ; $item++   )
        <label for="s{{ $item }}"></label>
        @endfor
       
    </div>
    <!-- .sh__btns -->

</div>
