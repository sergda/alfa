@extends('front.template')

@section('head')

    <meta name="csrf-token" content="{{ csrf_token() }}" xmlns="http://www.w3.org/1999/html">

    <title>contatto</title>
    <meta name="description" content="contatto">
    <meta name="keywords" content="contatto">




@stop

@section('main')

    <section class="text-left main-prod">
        <div class="row">
            <div class="col-lg-6">

                <div class="con-head">
                    CONTATTO
                </div>
                <div class="con-text">
                    Casa di Cura la Madonnina<br />
                    Via Quadronno, 29, 20122<br />
                    Milano, Italy
                </div>
                <div class="con-tel">
                    (+39 02) 583951
                </div>
                <div class="con-hr"></div>
                <div class="con-feedback">

                    <form name="sentMessage" class="form form-register1" id="fedbackForm"  novalidate>
                        {{ csrf_field() }}
                        <div class="modal-body form-group">
                            <div class="control-group">
                                <div class="row">
                                    <div class="controls col-lg-6">
                                        <input type="text" name="name" class="form-control" onblur='if(this.value=="") this.placeholder="Nome"' onfocus='if(this.value=="Nome") this.value=""' placeholder="NOME" id="name" required data-validation-required-message="Please, indicate Your Nome" />
                                        <p class="help-block"></p>
                                    </div>

                                    <div class="controls col-lg-6">
                                        <input type="email" name="email" class="form-control" onblur='if(this.value=="") this.placeholder="Your e-mail"' onfocus='if(this.value=="Your e-mail") this.value=""' placeholder="E-MAIL" id="email" required data-validation-required-message="Please, indicate Your e-mail" />
                                    </div>
                                </div>
                                <div class="controls">
                                    <textarea name="text" class="form-control" placeholder="TEXT" id="text" /></textarea>
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
            <div class="col-lg-6">

                <div id="mapContact"></div>
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

                        var map = new google.maps.Map(document.getElementById('mapContact'), {
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

@stop
