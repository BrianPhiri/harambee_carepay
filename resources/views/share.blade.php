<style>
    #img {
        height: 50px;
    }
</style>
<div class="social-buttons row">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
       target="_blank">
        {{--<i class="fa fa-facebook-official fa-3x"></i>--}}
        <img id="img" src="{{ asset('img/facebook.png') }}" alt="Facebook">
    </a>
    <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
       target="_blank">
        {{--<i class="fa fa-twitter-square fa-3x"></i>--}}
        <img id="img" src="{{ asset('img/twitter.png') }}" alt="Twitter">
    </a>
    <a href="https://plus.google.com/share?url={{ urlencode($url) }}"
       target="_blank">
        {{--<i class="fa fa-google-plus-square fa-3x"></i>--}}
        <img id="img" src="{{ asset('img/google-plus.png') }}" alt="GooglePlus">
    </a>
    {{--<a href="https://pinterest.com/pin/create/button/?{{--}}
        {{--http_build_query([--}}
            {{--'url' => $url,--}}
            {{--'media' => $image,--}}
            {{--'description' => $description--}}
        {{--])--}}
        {{--}}" target="_blank">--}}
        {{--<i class="fa fa-pinterest-square fa-3x"></i>--}}
    {{--</a>--}}
    <a href="whatsapp://send?text={{ urlencode($url) }}" data-action="share/whatsapp/share">
        <img id="img" src="{{ asset('img/whatsapp.png') }}" alt="Whatsapp">
        {{--<i class="fa fa-whatsapp fa-3x"></i>--}}
    </a>
</div>