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
                    <div class="item @if( $itemKey == 0 ) active @endif">

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
                {{--
                <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> --}}
            </div>

        </section>
    @endif


@endsection


@section('main')

    <section class="text-center main-prod">
        <div class="row">
            <div class="col-lg-6">
                <div style="background: #091634; height: 440px; width: 100%">11</div>
            </div>
            <div class="col-lg-3">
                <div style="background: #A0958C; height: 440px; width: 100%">22</div>
            </div>
            <div class="col-lg-3">
                <div style="background: #EDEDED; height: 440px; width: 100%">33</div>
            </div>
        </div>
    </section>
    <section class="text-center main-prod">
        <div class="row">
            <div class="col-lg-3">
                <div style="background: #CAC9D0; height: 440px; width: 100%">11</div>
            </div>
            <div class="col-lg-3">
                <div style="background: #EDEDED; height: 440px; width: 100%">11</div>
            </div>
            <div class="col-lg-3">
                <div style="background: #BECBDE; height: 440px; width: 100%">22</div>
            </div>
            <div class="col-lg-3">
                <div style="background: #0C182D; height: 440px; width: 100%">33</div>
            </div>
        </div>
    </section>
    <section class="text-center main-prod">
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

    @if( isset($main_page_slider) )
        <section class="text-center main-prod">

            <div class="design-head">SOCIET?</div>
            <div class="row">
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
    <section class="text-center main-prod">
        <div class="row mainMapBlock">
            <div class="col-lg-3">
                <div class="mainMapBlock-head">indirizzo</div>
                <div class="mainMapBlock-text">
                    Milano,<br />
                    Via Da Vinci,<br />
                    34
                </div>
                <button class="btn btn-wite"> SCRIVERE A NOI</button>
            </div>
            <div class="col-lg-9">
                <div id="map"></div>
                <script>
                    function initMap() {

                        var styledMapType = new google.maps.StyledMapType(
                                [
                                    {
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "color": "#f1f8f7"
                                            }
                                        ]
                                    },
                                    {
                                        "elementType": "labels.text.stroke",
                                        "stylers": [
                                            {
                                                "color": "#1a3646"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "administrative.country",
                                        "elementType": "geometry.stroke",
                                        "stylers": [
                                            {
                                                "color": "#4b6878"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "administrative.land_parcel",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "administrative.land_parcel",
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "color": "#64779e"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "administrative.neighborhood",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "administrative.province",
                                        "elementType": "geometry.stroke",
                                        "stylers": [
                                            {
                                                "color": "#4b6878"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "landscape.man_made",
                                        "elementType": "geometry.stroke",
                                        "stylers": [
                                            {
                                                "color": "#334e87"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "landscape.natural",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#010134"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#283d6a"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi",
                                        "elementType": "labels.text",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi",
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "color": "#6f9ba5"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi",
                                        "elementType": "labels.text.stroke",
                                        "stylers": [
                                            {
                                                "color": "#1d2c4d"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi.business",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi.park",
                                        "elementType": "geometry.fill",
                                        "stylers": [
                                            {
                                                "color": "#023e58"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi.park",
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "color": "#3C7680"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#304a7d"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road",
                                        "elementType": "labels",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road",
                                        "elementType": "labels.icon",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road",
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "color": "#98a5be"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road",
                                        "elementType": "labels.text.stroke",
                                        "stylers": [
                                            {
                                                "color": "#1d2c4d"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.arterial",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.highway",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#2c6675"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.highway",
                                        "elementType": "geometry.stroke",
                                        "stylers": [
                                            {
                                                "color": "#255763"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.highway",
                                        "elementType": "labels",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.highway",
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "color": "#b0d5ce"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.highway",
                                        "elementType": "labels.text.stroke",
                                        "stylers": [
                                            {
                                                "color": "#023e58"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road.local",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "transit",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "transit",
                                        "elementType": "labels.text.fill",
                                        "stylers": [
                                            {
                                                "color": "#98a5be"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "transit",
                                        "elementType": "labels.text.stroke",
                                        "stylers": [
                                            {
                                                "color": "#1d2c4d"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "transit.line",
                                        "elementType": "geometry.fill",
                                        "stylers": [
                                            {
                                                "color": "#283d6a"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "transit.station",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#3a4762"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "water",
                                        "elementType": "geometry",
                                        "stylers": [
                                            {
                                                "color": "#f5f8fc"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "water",
                                        "elementType": "labels.text",
                                        "stylers": [
                                            {
                                                "visibility": "off"
                                            }
                                        ]
                                    }
                                ],
                                {name: 'Styled Map'});

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: 44.379006, lng: 10.926891},
                            zoom: 7,
                            mapTypeControlOptions: {
                                mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                                    'styled_map']
                            }
                        });
                        map.mapTypes.set('styled_map', styledMapType);
                        map.setMapTypeId('styled_map');

                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqPXJEXMaOspwq1oRDGCAaj8ySAFFmQJQ&language=en&callback=initMap">
                </script>
            </div>
        </div>
    </section>


@endsection
