<div id="top-header" class="grid--full grid--table">
            <div class="wrapper">
                <div id="topother-header" class="grid--full grid--table">
                    <div class="grid__item one-half top-header-left">
                         Default Welcome Msg!
                    </div>
                    <div class="grid__item one-half top-header-right">
                       
                        <div class="fi-content inline-list social-icons">
                            @foreach (social_link() as $social)
                              <a href="#" title="Twitter" class="icon-social twitter" data-toggle="tooltip" data-placement="top"><i class="{{$social->icon}}"></i></a>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>