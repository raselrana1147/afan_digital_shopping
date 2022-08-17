 <div id="adv-banner">
            <div id="ads-banner" class="grid--full grid--table">
                <div class="ads-banner-slider owl-carousel">
                     @foreach (sliders('top') as $slider)
                    <div class="ads-item">
                        <img src="{{ asset('assets/backend/image/slider/small/'.$slider->image)}}" alt="ads banner 1" >
                    </div>                      
                    @endforeach
                   
                </div>
            </div>
        </div>