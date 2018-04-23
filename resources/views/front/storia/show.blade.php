@extends('front.template')

@section('head')

    <meta name="csrf-token" content="{{ csrf_token() }}" xmlns="http://www.w3.org/1999/html">

    <title>storia</title>
    <meta name="description" content="storia">
    <meta name="keywords" content="storia">




@stop

@section('main')

    <section class="text-left main-prod">
        <div class="row">
            <div class="col-lg-12">
                <div class="con-head">
                    STORIA
                </div>
            </div>
            <div class="col-lg-6 storia-img"></div>

            <div class="col-lg-6 storia-text">
                <div class="head">1978</div>
                <div class="text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <br ><br />
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>

            </div>

        </div>
        <div class="clearfix"></div>
        <div class="row storia-block2">
            <div class="col-lg-3">
                <div class="head">1990</div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class="img"><img src="/img/storia_img1990.jpg" alt="" /></div>
            </div>
            <div class="col-lg-3">
                <div class="head">2000</div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class="img"></div>
            </div>
            <div class="col-lg-3">
                <div class="head">2010</div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class="img"><img src="/img/storia_img2010.jpg" alt="" /></div>
            </div>
            <div class="col-lg-3">
                <div class="head beskonechnost">&infin;</div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class="img"></div>
            </div>
        </div>

        <div class="row" style="text-align: center;">
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

        <div class="row storia-block3">
            <div class="col-lg-6">
                <div class="head">I nostri vantaggi</div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <br /><br />
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <div class="col-lg-6">
                <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-captions" data-slide-to="1" ></li>
                        <li data-target="#carousel-example-captions" data-slide-to="2" ></li>
                        <li data-target="#carousel-example-captions" data-slide-to="3" ></li>

                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img data-src="/img/storia_galery1.jpg" alt="" src="/img/storia_galery1.jpg" data-holder-rendered="true" style="width: 640px; height: 500px;">
                        </div>
                        <div class="item">
                            <img data-src="/img/storia_galery2.jpg" alt="" src="/img/storia_galery2.jpg" data-holder-rendered="true" style="width: 640px; height: 500px;">
                        </div>
                        <div class="item">
                            <img data-src="/img/storia_galery3.jpg" alt="" src="/img/storia_galery3.jpg" data-holder-rendered="true" style="width: 640px; height: 500px;">
                        </div>
                        <div class="item">
                            <img data-src="/img/storia_galery4.jpg" alt="" src="/img/storia_galery4.jpg" data-holder-rendered="true" style="width: 640px; height: 500px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if( isset($main_page_design) )
            <section class="text-center main-prod" style="margin-top: 42px;">
                <div class="row" style="padding: 16px 0 0 0;">
                    @foreach($main_page_design as $itemKey=>$item)
                        <div class="col-lg-3">
                            @php
                                $src = str_replace('\\', '/', $item->preview_picture);
                            @endphp
                            <div class="hex one item{!! $itemKey !!}">
                                <div class="images1">
                                    <div class="images2" style="background-image: url({!! $src !!});"></div>
                                </div>
                            </div>
                            <div class="design-name">{!! $item->name !!}</div>
                            <div>{!! $item->slogan !!}</div>
                        </div>
                    @endforeach
                </div>

            </section>
        @endif



    </section>

@stop