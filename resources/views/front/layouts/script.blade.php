<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    function initMap() {
        const myLatLng = { lat: 26.2389, lng: 73.0243 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5,
            center: myLatLng,
        });

        var locations = {{ Js::from($store) }};

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
              marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
                map: map,
                title:locations[i]['title'],
                label:locations[i]['address'],
              });

              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  infowindow.setContent(locations[i]['title'],"hh");
                  infowindow.open(map, marker);
                }
              })(marker, i));

        }
    }

    window.initMap = initMap;
</script>

{{-- <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script> --}}
    <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=AIzaSyDsKhz3BibYao-KUMJZL_EyJ_rnDHa4dns&callback=initMap" ></script>
