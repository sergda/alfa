@extends('front.template')

@section('main_slider')

    @if( isset($main_page_slider) )
        <section class="text-center">
            <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                        @foreach( $main_page_slider as $itemKey=>$item )
                            <li data-target="#carousel-example-captions" data-slide-to="{!! $itemKey !!}" class="@if( $itemKey == 0 ) active @endif"></li>
                        @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach( $main_page_slider as $itemKey=>$item )
                    <div class="carousel-item @if( $itemKey == 0 ) active @endif">

                        @if( isset($item->url) )<a href="{!! $item->url !!}" title="">@endif
                            <img data-src="{!! $item->detail_picture !!}" alt="{!! $item->preview_picture_description !!}" src="{!! $item->detail_picture !!}" data-holder-rendered="true" style="width: 1280px; height: 500px;">
                        @if( isset($item->url) )</a>@endif
                           {{--
                            <div class="carousel-caption">
                            <h3>First slide label</h3>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                            --}}
                    </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </section>
    @endif


@endsection


@section('main')

    <section class="text-center">
        {{-- <img src="/img/schlossatelier-slider-5-e.jpg" class="img-fluid"> --}}
        <img src="/files/71CUTLnv-sL201.jpg" class="img-fluid" alt="trois">
    </section>
    <section class="jumbotron marTB10 mainText">

        {!! trans('front/site.mainText') !!}

    </section>


@endsection
