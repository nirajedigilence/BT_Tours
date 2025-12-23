@extends('layouts.front')

@section('content')

    <div class="notIndexContainer" style="margin-bottom: 200px;">
        <div class="aboutContainer">

            <div class="container">

                <h1 class="headingMainTitle">Map</h1>
                <div class="headingTitleCls"></div>
                <div class="aboutWrapper">
                    <div id="map"></div>
                </div>
                <?php 
                if(!empty($hotel))
                {
                    foreach($hotel as $hot)
                    {
                    ?>
                    <div class="hotInfo" data-id="<?=$hot->id?>">
                         <input type="hidden" name="hotel_lat_<?=$hot->id?>" id="hotel_lat_<?=$hot->id?>" value="{{!empty($hot->latitude)?$hot->latitude:''}}">
                         <input type="hidden" name="lng_<?=$hot->id?>" id="hotel_lng_<?=$hot->id?>" value="{{!empty($hot->longitude)?$hot->longitude:''}}">
                    </div>
                    <?php
                    }
                }
                ?>
            </div>

        </div>
    </div>
	<script type="text/javascript">
    $(window).on('load', function() {
         init_map();
    });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCrYs9n66w0Yh7bzhzRpWQCZ_QHavCZRow&libraries=places"></script>
    <script type="text/javascript">
   
    function init_map(){
        var i = 1;
        let locations = [[],[], [], []];
        $('.hotInfo').each(function(){
            var id = $(this).data("id");
            var lat = $('#hotel_lat_'+id).val();
            var lng = $('#hotel_lng_'+id).val();
            var name = $(this).data("name");
            locations.push( [name,lat,lng, i]);
            i++;
        });
        /* alert(locations[1][3]);
        locations[0].splice(col, 1);
        var locations = [
        ['Bondi Beach', -33.890542, 151.274856, 4],
        ['Coogee Beach', -33.923036, 151.259052, 5],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
        ]; */

        if($("#selectlat").val() != ""){
        var dfaltLat = $("#selectlat").val();
        }else{
        var dfaltLat = '51.5072';
        }
        
        if($("#selectlon").val() != ""){
        var dfaltLng = $("#selectlon").val();
        }else{
        var dfaltLng = '0.1276';
        }

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: new google.maps.LatLng(dfaltLat,dfaltLng),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {  
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
    </script>
	

@endsection
