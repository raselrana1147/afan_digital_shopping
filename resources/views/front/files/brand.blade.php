 <div class="slider-brands col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="yt-content-slider contentslider" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="7" data-items_column0="7" data-items_column1="5" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes"
            data-pagination="no" data-lazyload="yes" data-loop="yes">
        @foreach (brands() as $brand)
        <div class="item">
            <a href="{{ route('product.brand_wise_product',$brand->id) }}">
                <img src="{{ asset('assets/backend/image/brand/small/'.$brand->image)}}" alt="brand">
            </a>
        </div>
    @endforeach
</div> </div> 