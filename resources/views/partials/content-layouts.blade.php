@if(get_field('show_introduction'))
    <section id="intro" class="section intro yellow">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <h2>{{ get_field('introduction_headline') }}</h2>
  					<div class="content">
  						{!! get_field('introduction_content') !!}
  					</div>
                </div>
            </div>
        </div>
    </section>
@endif
@php($row_count = 1)
@if(have_rows('sections'))
    @while(have_rows('sections'))
        @php(the_row())
        @if(get_row_layout() == 'text_section')
            <section id="section-{{ $row_count }}" class="section text">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <h2><span>{{ get_sub_field(headline) }}</span></h2>
                        </div>
                        <div class="col-md-9 col-xs-12">
                            {!! get_sub_field('content') !!}
                            @if(get_sub_field('button_text') && get_sub_field('button_link'))
                                <div class="button-row">
                                    <a href="{{ get_sub_field('button_link') }}" class="button">{{ get_sub_field('button_text') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @elseif(get_row_layout() == 'half_section')
            <section id="section-{{ $row_count }}" class="section sidebyside {{ get_sub_field('background_color') }}">
                <div class="wrapper">
                    <div class="col-md-6 col-xs-12">
                        {!! get_sub_field('left_content') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                        {!! get_sub_field('right_content') !!}
                    </div>
                </div>
            </section>
        @elseif(get_row_layout() == 'map')
            <section id="section-{{ $row_count }}" class="section map">
                
            </section>
            <script type="text/javascript">
                function initMap{{ $row_count }}() {
                    var map = new google.maps.Map(document.getElementById('section-{{ $row_count }}'), {
                        center: {lat: {{ get_sub_field('center_latitude') }}, lng: {{ get_sub_field('center_longitude') }}},
                        zoom: 12,
                        styles: [
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#e9e9e9"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 29
                                    },
                                    {
                                        "weight": 0.2
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 18
                                    }
                                ]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#dedede"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.text.stroke",
                                "stylers": [
                                    {
                                        "visibility": "on"
                                    },
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "saturation": 36
                                    },
                                    {
                                        "color": "#333333"
                                    },
                                    {
                                        "lightness": 40
                                    }
                                ]
                            },
                            {
                                "elementType": "labels.icon",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "transit",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f2f2f2"
                                    },
                                    {
                                        "lightness": 19
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 17
                                    },
                                    {
                                        "weight": 1.2
                                    }
                                ]
                            }
                        ]
                    });

                    var markers = [];
                    var tmp;

                    @foreach(get_sub_field('markers') as $marker)
                        @if($marker['latitude'] && $marker['longitude'])
                            tmp = new google.maps.Marker({
                                position: {lat: parseFloat({{ $marker['latitude']}}), lng: parseFloat({{ $marker['longitude'] }}) },
                                map: map,
                                icon: '{{ App\asset_path("images/marker.png") }}',
                                title: '{{ $marker['label'] }}'
                            });
                            markers.push(tmp);
                        @endif
                    @endforeach
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVwbkUbGekkcE621Y_1rIRyeRD071flG0&callback=initMap{{ $row_count }}"
    async defer></script>
        @endif
        @php($row_count++)
    @endwhile
@else
    @include('partials.content-page')
@endif