 <div class="grid__item small--one-whole medium--one-whole three-quarters main-slideshow">
<div class="main_slideshow_wrapper">
    <div id="slider" class="flexslider">
        <ul class="slides">
            @foreach (sliders('main') as $slider)
                <li>
                    <img src="{{ asset('assets/backend/image/slider/small/'.$slider->image)}}" alt="" />
                </li>
             @endforeach
        </ul>
    </div>
    <div id="carousel" class="flexslider">
        <ul class="slides">
            @foreach (sliders('mini') as $slider)
            <li>
                <div>
                    <img src="{{ asset('assets/backend/image/slider/small/'.$slider->image)}}" alt="">
                    <span class="cr-title"><a href="{{$slider->url}}">{{$slider->title_1}}</a></span>
                    <span class="cr-desc">{{$slider->title_2}}</span>
                </div>
            </li>  
        @endforeach
    </div>
</div>
</div>