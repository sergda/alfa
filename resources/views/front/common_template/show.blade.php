@extends('front.template')

@section('head')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $post->title }}</title>
    <meta name="description" content="{{ $post->description }}">
    <meta name="keywords" content="{{ $post->keywords  }}">




@stop

@section('main')



    <section class="text-center main-prod">
        <div class="row detail-block-head">
            <div class="col-lg-5 detail-text">
                <div class="name">{{  $post->title }}</div>
                <div class="text">{!!  $post->detail_text !!}</div>
                <div class="property">{!!  $post->property !!}</div>
            </div>
            <div class="col-lg-7 detail-img">
                <img src="{{  $post->image_passport }}" alt="{{  $post->title }}">
            </div>
        </div>


        <div class="row detail-block-img">
            @php
            $src = str_replace('\\', '/', $post->image_passport_left);
            @endphp
            <div class="col-lg-3 img-left" style="background-image: url({{ $src }})"></div>

            <div class="col-lg-3 more-photo">

                <div class="row">
                    @if(isset($post->slider_input) &&  $post->slider_input != '')
                        @foreach(json_decode(urldecode($post->slider_input)) as $item)
                            <div class="col-lg-6">
                                <img class="img-fluid" src="{{ $item->src }}" alt="{{ $item->alt }}" />
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
            @php
            $src = str_replace('\\', '/', $post->image_passport_right);
            @endphp
            <div class="col-lg-3 img-right" style="background-image: url({{ $src }})"></div>

            <div class="col-lg-3 bg-r-right"></div>

        </div>




        <div class="row">
            <div class="col-lg-12 fedback">
                <div class="span1"><span> Riceve delle notizie su nuove collezioni </span></div>
                <div class="span2">

                    <div class="feedbackForm">
                        <form name="sentMessage" class="form form-register1" id="fedbackForm"  novalidate>
                            {{ csrf_field() }}
                            <div class="modal-body form-group">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" onblur='if(this.value=="") this.placeholder="Nome"' onfocus='if(this.value=="Nome") this.value=""' placeholder="NOME" id="name" required data-validation-required-message="Please, indicate Your Nome" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" onblur='if(this.value=="") this.placeholder="Your e-mail"' onfocus='if(this.value=="Your e-mail") this.value=""' placeholder="E-MAIL" id="email" required data-validation-required-message="Please, indicate Your e-mail" />
                                    </div>
                                    <input type="hidden" name="name" value="">
                                    <input type="hidden" name="catalogueFeedback" value="catalogueFeedback">
                                    <button type="submit" class="btn form-button">
                                        <span>
                                            INVIARE
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div id="success"> </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </section>



    @if(isset($slider) &&  $slider != '')
        <div class="row sliderBlock text-center">
            @foreach(json_decode(urldecode($slider)) as $item)
                <div class="col-lg-4">
                    <div class="sliderDescription">{{ $item->alt }}</div>
                    <a href="{{ $item->src }}" title="{{ $item->alt }}" data-lightbox="roadtrip">
                        <img data-original="{{ $item->src }}" class="img-fluid lazy" src="/img/img1x1.png" alt="{{ $item->alt }}" />
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    @if( isset($content_bottom) )
        <section class="jumbotron mainText marTB10">
            <div>
                {!! $content_bottom !!}
            </div>
        </section>
    @endif
@stop
